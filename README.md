# Gradivote
A simple poll app for voting on gradients

## Features
- Let a user submit a custom gradient
- Users can vote on submitted gradients with a thumbs up or down
- A gradient can consist of at least 2 colors and a direction and/or type (radial, linear etc)
- Login with user
- View submitted and voted gradients
  
## Extra Features
- Hall of Fame
- Worst gradients list

## Endpoints
POST /register - Register a user  
POST /login - Login a user with credentials  

POST /user - Get current logged in user  
GET /user/votes - Get user votes  
GET /user/gradients - Get user gradients  

GET /gradients - Get all gradients  
GET /gradients/{id} - Get a gradient  
PATCH /gradients/{id} - Update a gradient  
POST /gradients - Submit a new gradient  
(DELETE /gradients/{id} - Delete a gradient)  

POST /gradients/vote - Submit a gradient vote  
