import json

from app import app, db
from flask import abort, jsonify, request, g
import models
from datetime import datetime
import jwt
import hashlib


@app.route('/login', methods=['POST'])
def login():
    error = None
    data = None
    status = 200
    try:
        form = request.get_json(force=True)
        
        user = models.Admin.autenticate(form.get('username', None), form.get('password', None))
        if user != None:
            data = jwt.encode({'id': user.id, 'level': user.level}, app.config['SECRET_KEY'], algorithm='HS256')
            risposta = jsonify({
                'error': None,
                'data': data
            })
            risposta.set_cookie('token', data)
            return risposta

        raise Exception('Authentication failed')

    except Exception as e:
        data = None
        error = str(e)
        status = 401
    finally:
        return jsonify({
            'error': error,
            'data': data
        }), status


@app.route('/event/all', methods=['GET', 'POST'])
def send_events():
    events = []
    for x in models.Event.query.all():
        events.append(x.toObject())

    return jsonify({
        'error': None,
        'events': events,
    }), 200


@app.route('/event/create', methods=['POST'])
def create_event():
    error = None
    status= "undefined"
    try:
        args = request.get_json(force=True)
        name = args.get('name', None)
        latitude = args.get('latitude', None)
        longitude = args.get('longitude', None)
        startDay = args.get('startDay', None)
        endDay = args.get('endDay', None)
        description = args.get('description', None)
        opensAt = args.get('opensAt', None)

        if None in [name, latitude, longitude, startDay, endDay, description, opensAt]:
            raise Exception('Missing data')            

        FooBar = models.Event(
            name = name,
            latitude = latitude,
            longitude = longitude,
            start_day = startDay,
            end_day = endDay,
            description = description,
            opens_at = opensAt
        )
        
        db.session.add(FooBar)
        db.session.commit()
        
    
    except Exception as e:
            error = str(e),
            status = 400
    
    finally:
        return jsonify({
            'error': error,
        }), status

@app.route('/admin/<int:id>/read', methods=['GET', 'POST'])
def get_admin(id):
    admin = models.Admin.query.get(id)
    if admin is None:
        return jsonify({
            'error': 'Not Found',
            'event': {},
        }), 404
    return jsonify({
        'error': None,
        'level': admin.toObject(),
    }), 200

@app.route('/admin/all', methods=['GET', 'POST'])
def get_admin_list():
    admins = []
    for x in models.Admin.query.all():
        admins.append(x.toObject())

    return jsonify({
        'error': None,
        'admins': admins,
    }), 200

@app.route('/admin/<int:id>/delete', methods=['GET', 'POST'])
def delete_admin(id):
    try:
        admin = models.Admin.query.get(id)
        db.session.delete(admin)
        db.session.commit()
        return jsonify({
            'error': None,
        }), 200
    
    except Exception as e:
        return jsonify({
            'error': "Error while deleting admin"
        }), 404


@app.route('/admin/create', methods=['POST'])
def create_admin():
    error = None
    status = 200
    try:
        args = request.get_json(force=True)
        name = args.get('name', None)
        surname = args.get('surname', None)
        email = args.get('email', None)
        phone = args.get('phone', None)
        username = args.get('username', None)
        level = args.get('level', None)
        password = args.get('password', None)
        
        if None in [name, surname, email, username, level, password]:
            raise Exception('Missing data')
        
        passwordHash = hashlib.sha512( str( password ).encode("utf-8") ).hexdigest()

        foobar = models.Admin(
            name = name,
            surname = surname,
            email = email,
            phone = phone,
            username = username,
            level = level,
            password = passwordHash
        )

        db.session.add(foobar)
        db.session.commit()
    
    except Exception as e:
        error = str(e)
        status = 200

    finally:
        return jsonify({
            'error': error,
        }), status


@app.route('/event/<int:id>/read', methods=['GET', 'POST'])
def get_event_data(id):
    event = models.Event.query.get(id)
    if event is None:
        return jsonify({
            'error': 'Not Found',
            'event': {},
        }), 404

    return jsonify({
        'error': None,
        'event': event.toObject(),
    }), 200


@app.route('/event/<int:id>/update', methods=['POST'])
def update_event_data(id):
    return jsonify({
        'error': 'Not implemented',
    }), 501


@app.route('/event/<int:id>/delete', methods=['GET', 'POST'])
def delete_event_data(id):
    try:
        event = models.Event.query.get(id)
        db.session.delete(event)
        db.session.commit()
        return jsonify({
            'error': None,
        }), 200
    
    except Exception as e:
        return jsonify({
            'error': "Error while deleting event"
        }), 404


@app.route('/event/<int:id>/device/all', methods=['GET', 'POST'])
def get_all_event_devices(id):
    return jsonify({
        'error': 'Not implemented',
        'devices': [],
    }), 501


@app.route('/event/<int:event_id>/device/<int:device_id>/add')
def add_device_to_event(event_id, device_id):
    return jsonify({
        'error': 'Not implemented',
    }), 501


@app.route('/event/<int:event_id>/device/<int:device_id>/read')
def get_event_device(event_id, device_id):
    return jsonify({
        'error': 'Not implemented',
        'device': {},
    }), 501



@app.route('/event/<int:event_id>/device/<int:device_id>/update')
def update_event_device(event_id, device_id):
    return jsonify({
        'error': 'Not implemented',
    }), 501



@app.route('/event/<int:event_id>/device/<int:device_id>/delete')
def delete_event_device(event_id, device_id):
    return jsonify({
        'error': 'Not implemented',
    }), 501


@app.route('/device/all')
def send_devices():
    devices = []
    for x in models.Model.query.all():
        devices.append(x.toObject())

    return jsonify({
        'error': None,
        'device': devices,
    }), 200


@app.route('/device/create', methods=['POST'])
def create_device():
    error = None
    status = 200
    try:
        args = request.get_json(force=True)
        name = args.get('name', None)
        brand_name = args.get('brand', None)
        minHz = args.get('min', None)
        maxHz = args.get('max', None)
        if None in [name, brand_name, minHz, maxHz]:
            raise Exception('Missing data')
        
        selected_brand = models.Brand.query.filter(models.Brand.name.like(brand_name))
        if selected_brand.count() == 0:
            selected_brand = models.Brand(
                name = brand_name
            )
            db.session.add(selected_brand)
            db.session.commit()
        
        else:
            selected_brand = selected_brand.first()
        
        foobar = models.Model(
            name = name,
            brand = selected_brand.id,
            min_freq = minHz,
            max_freq = maxHz
        )

        db.session.add(foobar)
        db.session.commit()
    
    except Exception as e:
        error = str(e)
        status = 200

    finally:
        return jsonify({
            'error': error,
        }), status


@app.route('/device/<int:id>/delete')
def delete_device_data(id):
    
    try:
        device = models.Model.query.get(id)
        db.session.delete(device)
        db.session.commit()
        return jsonify({
            'error': None,
        }), 200
    
    except Exception as e:
        return jsonify({
            'error': "Error while deleting device"
        }), 404


@app.route('/device/<int:id>/update')
def update_device_data():
    return jsonify({
        'error': 'Not implemented',
    }), 501

@app.route('/user/all')
def send_users():
    error = None
    status = 200
    events = []
    try:
        for x in models.Agency.query.all():
            events.append(x.toObject())
    except Exception as e:
        error = str(e)
        status = 403
    finally:
        return jsonify({
            'error': error,
            'agencies': events,
        }), status


@app.route('/user/<int:id>')
def get_user_data(id):
    return jsonify({
        'error': 'Not implemented',
        'user': {},
    }), 501


@app.route('/user/<int:id>/activate')
def activate_user_by(id):
    error = None
    status = 200
    try:
        #check_permissions(1)
        foobar = models.Agency.query.get(id)
        if foobar is None:
            raise Exception('Utente non esiste')

        foobar.enabled = True
        db.session.commit()
    
    except Exception as e:
        error = str(e)
        if error == "Utente non esiste":
            status = 400
        else:
            status = 403

    finally:
        return jsonify({
            'error': error
        }), status


@app.route('/brand/all')
def get_all_brands():
    data = []
    error = None
    status = 200
    try:
        check_permissions(1)
        for x in models.Brand.query.all():
            data.append(x.toObject())
    except Exception as e:
        error = str(e)
        status = 403
    finally:    
        return jsonify({
            'error': error,
            'brands': data
        }), status

def check_permissions(level):
    if g.data is None or g.data.get("level", 0) < level:
        raise Exception("forbidden, your level is: " . g.data.get("level"))
