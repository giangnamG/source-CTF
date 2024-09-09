import helper
import random

def run(db, User):
    with open('users.txt', 'r') as f:
        users = f.read().splitlines()
    for uname in users:
        helper.store_users(db, User, uname+'@gmail.com', str(random.randint(100000,999999)))