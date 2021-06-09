import hashlib

from app import db
from sqlalchemy.dialects.mysql import BIGINT



# Define a base model for other database tables to inherit
class Base(db.Model):
    __abstract__  = True

    id            = db.Column(db.Integer, primary_key=True)
    date_created  = db.Column(db.DateTime, default=db.func.current_timestamp())
    date_modified = db.Column(db.DateTime, default=db.func.current_timestamp(), onupdate=db.func.current_timestamp())


class Admin(Base):
    __tablename__ = 'admins'

    name = db.Column(db.String(32), nullable=False)
    surname = db.Column(db.String(32), nullable=False)
    username = db.Column(db.String(64), nullable=False)
    email = db.Column(db.String(256), nullable=False)
    phone = db.Column(db.String(16), nullable=False)
    password = db.Column(db.String(256), nullable=False)
    level = db.Column(db.Integer, nullable=False, default=0)

    @staticmethod
    def autenticate(username, password):
        
        user = Admin.query.filter(
            Admin.username == username
        ).first()

        if user == None:
            raise Exception('User not found')
        
        phash = hashlib.sha512( str( password ).encode("utf-8") ).hexdigest()
        
        return user if phash == user.password else None

    @staticmethod
    def register(username, password):
        return None

    def toObject(self):
        return {
            'id': self.id,
            'name': self.name,
            'surname': self.surname,
            'username': self.username,
            'email': self.email,
            'phone': self.phone,
            'level': self.level,
        }


class Log(Base):
    __tablename__ = 'logs'

    admin = db.Column(db.Integer, nullable=False)
    description = db.Column(db.String(4096), nullable=False)
    timestamp = db.Column(db.DateTime, nullable=False)
    log_type = db.Column(db.Integer, nullable=False)



class LogType(Base):
    __tablename__ = 'log_types'

    description = db.Column(db.String(4096), nullable=False)


class Agency(Base):
    __tablename__ = 'agencies'

    username = db.Column(db.String(64), nullable=False)
    password = db.Column(db.String(512), nullable=False)
    PEC = db.Column(db.String(300), nullable=False)
    name = db.Column(db.String(64), nullable=False)
    enabled = db.Column(db.Boolean, nullable=False, default=0)

    def toObject(self):
        return {
            'id': self.id,
            'name': self.name,
            'username': self.username,
            'pec': self.PEC,
            'is_active': self.enabled,
        }


class Event(Base):
    __tablename__ = 'events'

    name = db.Column(db.String(128), nullable=False)
    latitude = db.Column(db.Float, nullable=False)
    longitude = db.Column(db.Float, nullable=False)
    start_day = db.Column(db.DateTime, nullable=False)
    end_day = db.Column(db.DateTime, nullable=False)
    description = db.Column(db.String(4096), nullable=False)
    opens_at = db.Column(db.DateTime, nullable=False)

    def toObject(self):
        return {
            'id': self.id,
            'name': self.name,
            'description': self.description,
            'location': [self.latitude, self.longitude],
            'period': [self.start_day, self.end_day],
            'opens_at': self.opens_at
        }



class Reservation(Base):
    __tablename__ = 'reservations'

    agency = db.Column(db.Integer, nullable=False)
    event = db.Column(db.Integer, nullable=False)

    def toObject(self):
        return {
            'id': self.id,
            'agency': Agency.query.get(self.agency).toObject(),
            'event': Event.query.get(self.event).toObject(),
        }



class UsedDevice(Base):
    __tablename__ = 'used_devices'

    freq = db.Column(BIGINT(unsigned=True), nullable=False)
    reservation = db.Column(db.Integer, nullable=False)

    def toObject(self):
        return {
            'id': self.id,
            'freq': self.freq,
            'reservation': Reservation.query.get(self.reservation).toObject(),
        }


class Brand(Base):
    __tablename__ = 'brands'

    name = db.Column(db.String(64), nullable=False)

    def toObject(self):
        return {
            'id': self.id,
            'name': self.name,
        }


class Model(Base):
    __tablename__ = 'models'

    name = db.Column(db.String(64), nullable=False)
    brand = db.Column(db.Integer, nullable=False)
    min_freq = db.Column(BIGINT(unsigned=True), nullable=False)
    max_freq = db.Column(BIGINT(unsigned=True), nullable=False)

    def toObject(self):
        return {
            'id': self.id,
            'name': self.name,
            'freq': [self.min_freq, self.max_freq],
            'brand':Brand.query.get(self.brand).name,
        }