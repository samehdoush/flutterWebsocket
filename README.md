# flutterWebsocket
 demo project server-side for dart_pusher_channels https://github.com/kerimamansaryyev/dart_pusher_channels
 
 url demo : https://dart-pusher-channels.ps4tek.com/dashboard
 Create a new user so as not to conflict with other users
 
 # api login 
 
https://dart-pusher-channels.ps4tek.com/api/login 

email => String,

password => String,

device_name => String


# flutter 
```
                 authorizationEndpoint:
                      Uri.parse('https://dart-pusher-channels.ps4tek.com/api/broadcasting/auth'),
                  headers: {
                    'Authorization': 'Bearer ${Token ?? ''}', // token from api 
                    'Accept': 'application/json',
                    "Content-Type": 'application/json',
                  },
```

 [![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F3b7a0e4d-a030-4825-907c-caa3dd5602d8%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com)



