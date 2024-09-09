from flask_sqlalchemy import SQLAlchemy
from flask_login import UserMixin


db = SQLAlchemy()


class User(UserMixin, db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), nullable=True)
    email = db.Column(db.String(120), unique=True, nullable=False)
    password = db.Column(db.String(128), nullable=False)
    avatar = db.Column(db.String(120), nullable=True)
    flag = db.Column(db.String(128), nullable=True, default='no permission')
    role = db.Column(db.String(10), nullable=False, default='user')
    current_token = db.Column(db.String(256), nullable=True)
    jti = db.Column(db.String(128), nullable=True)