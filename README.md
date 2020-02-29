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
- [x] POST /register - Register a user  
- [x] POST /login - Login a user with credentials  

- [x] POST /user - Get current logged in user  
- [ ] GET /user/{id}/votes - Get user votes  
- [ ] GET /user/{id}/gradients - Get user gradients  

- [x] GET /gradients - Get all gradients  
- [x] GET /gradients/{id} - Get a gradient    
- [ ] POST /gradients - Submit a new gradient  
- [ ] (DELETE /gradients/{id} - Delete a gradient)  

- [x] GET /votes - Get all votes
- [x] GET /votes/{id} - Get vote by id
- [x] POST /votes - Submit a gradient vote  
