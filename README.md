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

GET /gradient - Get all gradients
GET /gradient/{id} - Get a gradient
PATCH /gradient/{id} - Update a gradient
POST /gradient - Submit a new gradient
(DELETE /gradient/{id} - Delete a gradient)

POST /gradient/vote - Submit a gradient vote
