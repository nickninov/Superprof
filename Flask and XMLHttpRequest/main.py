# 404 - Not found
# 400 - Bad Request
# 200 - OK success

# pip install -U flask-cors
from flask_cors import CORS, cross_origin
from flask import Flask, request, jsonify

# Flasj - object to cerate server
# request - to handle GET PUT POST DELEte requests
# jsonify - to make JSON objects

app = Flask (__name__)

# Allow Cross-Origin Resource Sharing - for XMLHttpRequests
cors = CORS(app)

# List that stores users
userList = []


# Get use by ID GET request
@app.route('/GET/user/<id>',methods = ['GET'] )
def getUser(id):

    userInfo = None
    # Search list of user
    for user in userList:

        # Find user by ID
        if int(id) == user['id']:

            # Return user to client
            return jsonify({
                'user': user,
                'message': 'User found!',
                'status': 200
            })

    # Return user not found to client
    return jsonify({
        'user': userInfo,
        'message': 'User not found!',
        'status': 404
    })

# Post request to add user to back end
@app.route('/POST/user', methods = ['POST'])
def postUser():

    # Get the incoming data in JSON format
    data = request.get_json()

    # Get first name
    firstName = data['firstName']

    # Get last name
    lastName = data['lastName']

    # Get email
    email = data['email']

    # Push user to list in JSON format
    userList.append({
        "id": len(userList),
        "firstName": firstName,
        "lastName": lastName,
        "email": email
    })
    # Return success message to client
    return jsonify({
        'message': 'User has been successfully added!',
        'status': 200
    })


app.run(debug=True)