from flask import Flask, jsonify, request
from flask_cors import CORS
from flask_jwt_extended import JWTManager, create_access_token, jwt_required, get_jwt_identity, get_jti, get_jwt
from models import db, User
from config import ApplicationConfig
import migrate


app = Flask(__name__)

CORS(app, resources={r"/api/*": {"origins": "*"}}, supports_credentials=True)

jwt = JWTManager(app)
jwt.expired_token_loader

# Cấu hình cơ sở dữ liệu từ file config
app.config.from_object(ApplicationConfig)
db.init_app(app)

@app.route('/api/v1/users', methods=['POST'])
def users():
    req = request.get_json()
    page = req['page']
    per_page = req['per_page']
    pagination = User.query.paginate(page=page, per_page=per_page)
    users = []
    for user in pagination.items:
        users.append({
            'id': user.id, 
            'username': user.username,
            'email': user.email,
            'flag': user.flag,
            'role': user.role,
            'avatar': user.avatar
            })
    return jsonify({'messages': 'ok', 
        'users': users,
        'pagination': {
            'page': pagination.page,
            'total': pagination.total,
            'per_page': pagination.per_page,
            'has_next': pagination.has_next,
            'has_prev': pagination.has_prev
            }
    })

if __name__ == '__main__':
    with app.app_context():
        db.create_all()
        migrate.run(db=db, User=User)
        
    app.run(host='0.0.0.0', port=5000, debug=True)