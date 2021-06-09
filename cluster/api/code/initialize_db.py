#!/usr/bin/env python3
# Script per settare il db

from app import app, db
from models import *
from os import remove
import datetime
import hashlib


#remove('app.db')
db.drop_app()
db.create_all()
raise Exception('wapeety is stoopid')

# Utenti
user_admin = Admin(
    name='Mario',
    surname='Rossi',
    email='mario.rossi@mediaway.it',
    password=hashlib.sha512('password'.encode('utf-8')).hexdigest(),
    username='admin',
    phone='+39 3275378003',
    level=3,
)
db.session.add(user_admin)
db.session.commit()


# Eventi
event_one = Event(
    name='Esame di Stato 2020-2021',
    description='L\'esame di stato che le 5e devono svolgere',
    latitude=32.0,
    longitude=21.115,
    start_day=datetime.datetime(2021, 6, 16, 12, 0, 0),
    end_day=datetime.datetime(2021, 6, 21, 12, 0, 0),
    opens_at=datetime.datetime(2021, 6, 16, 11, 59, 59)
)

db.session.add(event_one)
db.session.commit()