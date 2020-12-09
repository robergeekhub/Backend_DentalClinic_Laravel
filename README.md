<h1 align="center">clinicaDental (dentalClinic)</h1>

📢 Backend of a dating APP for a dental clinic
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

<h2>  Users  👥 </h2><br>
Allows you to respond to all requests from the Frontend such as registering,logging and logout.<br>

POST -> api/register<br><br>
POST -> api/login<br><br>
GET  -> api/logout<br><br>

<h2>Appointments 📥 </h2><br>
Allows you to create a dentist appointment, delete the appointment or view all pending appointments<br>

GET -> api/usersWithAppointments<br><br>
GET -> api/appointments<br><br>
POST -> api/appointment/create<br><br>
DELETE -> api/appointment/cancel/{id}<br><br>

