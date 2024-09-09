def store_users(db, User, email, password):
    try:
        new_user = User(
            email=email,
            password=password,
        )
        db.session.add(new_user)
        db.session.commit()
    except Exception as e:
        print(e)