from app import app, db
from flask import redirect, request, session, jsonify, g
import models
import jwt


@app.before_request
def authorization_filter():
    token = None
    if request.headers.get('X-CSRF-Token', None) is not None:
        token = request.headers.get('X-CSRF-Token')

    if token is not None:
        try:
            g.data = jwt.decode(token, app.config['SECRET_KEY'],algorithms=["HS256"])

        except Exception as e:
            return jsonify({'message': str(e)}), 401
    
    else:
        g.data = None


@app.after_request
def set_headers_cors(response):
    response.headers['Access-Control-Allow-Origin'] = '*'
    return response