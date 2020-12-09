<h1 align="center">clinicaDental (dentalClinic)</h1>

📢 Frontend of a dating APP for a dental clinic
=======
📢 Backend of a dating APP for a dental clinic that allows user registration, login and logout of the application also allows you to create an appointment, delete the appointment and see pending appointments.

# Used Tools 🔨
 
 ◼️ VSCode<br>
 ◼️ Laravel<br>
 ◼️ PHP<br>
 ◼️ Github<br>
 ◼️ Axios<br>
 ◼️ Postman<br>
 ◼️ MySQL<br>
 ◼️ Composer<br>
 

# Use of the App  📃

<h2>  Users  👥 </h2>
Allows you to respond to all requests from the Frontend such as registering,logging and logout.

POST -> api/register 
POST -> api/login
GET  -> api/logout

<h2>Appointments 📥 </h2>
allows you to create a dentist appointment, delete the appointment or view all pending appointments<br>

GET -> api/usersWithAppointments
GET -> api/appointments 
POST -> api/appointment/create   
DELETE -> api/appointment/cancel/{id}

