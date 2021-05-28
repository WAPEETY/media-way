import json

from app import app, db
from flask import abort, jsonify, request, g
import models
from datetime import datetime



@app.route('/login', methods=['POST'])
def login():
    print(dir(g))
    return jsonify({
        'error': 'Not implemented',
        'token': '',
    }), 501


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
    try:
        FooBar = models.Event(
            name=request.form['name'],
            latitude=request.form['lat'],
            longitude=request.form['lng'],
            start_day=datetime.now(),
            end_day=datetime.now(),
            description=request.form['description'],
            opens_at=datetime.now()
        )

        db.session.add(FooBar)
        db.session.commit()
        return jsonify({
            'error': None
        }), 200
    
    except Exception as e:
        return jsonify({
            'error': str(e),
        }), 400


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
    return jsonify({
        'error': 'Not implemented',
    }), 501


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
    return jsonify({
        'error': 'Not implemented',
        'devices': [],
    }), 501


@app.route('/device/create')
def create_device():
    return jsonify({
        'error': 'Not implemented',
    }), 501


@app.route('/device/<int:id>/delete')
def read_device_data():
    return jsonify({
        'error': 'Not implemented',
    }), 501


@app.route('/device/<int:id>/update')
def update_device_data():
    return jsonify({
        'error': 'Not implemented',
    }), 501


@app.route('/device/<int:id>/delete')
def delete_device():
    return jsonify({
        'error': 'Not implemented',
    }), 501



@app.route('/user/all')
def send_users():
    return jsonify({
        'error': 'Not implemented',
        'users': [],
    }), 501


@app.route('/user/<int:id>')
def get_user_data(id):
    return jsonify({
        'error': 'Not implemented',
        'user': {},
    }), 501

