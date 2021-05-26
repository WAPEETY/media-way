from app import app, db
from flask import redirect, request, session, jsonify, g
import models


@app.before_request
def authorization_filter():
    token = None
    if request.cookies.get('token', None) is not None:
        token = request.cookies.get('token')

    if token is not None:
        try:
            g.data = jwt.decode(token, app.config['SECRET_KEY'])

        except:
            return jsonify({'message': 'Invalid token'}), 401
    
    else:
        g.data = None


@app.after_request
def set_headers_cors(response):
    response.headers['Access-Control-Allow-Origin'] = '*'
    return response