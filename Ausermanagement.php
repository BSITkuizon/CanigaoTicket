<?php
include 'connection.php';

// Fetch and display all registered accounts from the database
$sql = "SELECT FirstName, LastName, Email, Username, agentID, Password, BoatID, Role, PhoneNumber FROM Useraccounts";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="auseranangement.css">
 
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/{your-bootstrap-version}/css/bootstrap.min.css">
    <title>Admin Management</title>
    
<style>

button {
            margin: 0 10px;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #43FB39;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 2 1'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='1' gradientTransform='rotate(72,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%2343FB39'/%3E%3Cstop offset='1' stop-color='%237775FF'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='0' y1='0' x2='0' y2='1' gradientTransform='rotate(216,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%2361532D' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%2361532D' stop-opacity='1'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='0' y1='0' x2='2' y2='2'%3E%3Cstop offset='0' stop-color='%2361532D' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%2361532D' stop-opacity='1'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='2' height='1'/%3E%3Cg fill-opacity='0.5'%3E%3Cpolygon fill='url(%23b)' points='0 1 0 0 2 0'/%3E%3Cpolygon fill='url(%23c)' points='2 1 2 0 0 0'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover; /*center center/cover no-repeat;*/
    padding: 20px;
    border-radius: 8px;
    max-width: 600px;
    width: 80%;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
}



        .close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Add Member Form Styles */
        #addMemberForm {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        #addMemberForm label {
            margin-bottom: 10px;
            font-weight: bold;
            width: 48%;
        }

        #addMemberForm input,
        #addMemberForm select {
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 48%;
        }

        #addMemberForm input[type="submit"] {
    background-color: blue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 16px; /* Adjusted padding */
    font-size: 14px; /* Adjusted font size */
    width: 50%;
    margin: 0 auto; /* Center the button */
}


        #addMemberForm input[type="submit"]:hover {
            background-color: skyblue;
        }
   footer {
            background-color: #d6d8d9;
            color: #ffffff;
            text-align: center;
            padding: 10px;
        }


</style>


        
  
</head>
<body id="body">
    <div class="container">
      <!-- Bootstrap Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="navbar-brand active_link" href="#">Admin</a>
        </div>
        <!-- navbar search -->
        <div class="navbar__right">
         
        </div>
      </nav>

        <main style="background-color: #f3faff";>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>HELLO ADMIN</h1>
              <p>Welcome to admin dashboard</p>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <!-- Bootstrap Cards -->
            <div class="card bg-light">
              <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Tourist</p>
                <span class="font-bold text-title">578</span>
              </div>
            </div>

            <div class="card bg-light">
              <i class="fa fa-home fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Available Cottages</p>
                <span class="font-bold text-title">9</span>
              </div>
            </div>

            <div class="card bg-light">
              <i class="fa fa-ship fa-2x text-yellow" aria-hidden="true"></i>
               <div class="card_inner">
                 <p class="text-primary-p">Active Boat</p>
                 <span class="font-bold text-title">12</span>
              </div>
            </div>
<?php
include 'connection.php';
$sql = "SELECT FirstName, LastName, Email, Username FROM Useraccounts";
$result = mysqli_query($conn, $sql);

// Perform a SELECT query to retrieve data from your table
$sql = "SELECT * FROM Useraccounts"; // Replace YourTableName with your actual table name

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Count the active Ticketing Agents
$activeTicketingAgentsCount = mysqli_num_rows($result);
?>
            <div class="card bg-light">
             <i class="fa fa-user-secret fa-2x text-green" aria-hidden="true"></i>
                 <div class="card_inner">
                 <p class="text-primary-p">Active Ticketing Agent</p>
                  <span class="font-bold text-title"><?php echo $activeTicketingAgentsCount; ?></span>
                  </div>
              </div>

          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            

    <!-- Table -->
  <table class="table table-striped table-bordered">
  <!-- Add this column header to your table -->
<thead>
  <tr>
    <th>#</th> <!-- Row number column -->
    <th>Full Name</th>
    <th>Agent ID</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>Boat Name</th>
    <th>Role</th>
    <th>Phone Number</th>
     <th>Action</th>  
  </tr>
</thead>

<tbody>
  <?php
  $rowNumber = 1; 

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
   
    echo "<td>" . $rowNumber . "</td>"; // Display the row number
    echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
    echo "<td>" . $row['agentID'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Password'] . "</td>";
    echo "<td>" . $row['BoatID'] . "</td>";
    echo "<td>" . $row['Role'] . "</td>";
    echo "<td>" . $row['PhoneNumber'] . "</td>";
   echo "<td class='action-buttons'>";
   echo "<button id='openEditMemberModalBtn'>Edit</button>";


   echo "<a class='delete' href='deleteuser.php?agentid=" . $row['agentID'] . "'>Delete</a>";
   echo "</td>";

    echo "</tr>";
    
    $rowNumber++; // Increment row number for the next row
  }
  ?>
</tbody>
</table>

 <!-- Button to Add Ticketing Agent Account -->
 

  </div>

  <button id="openAddMemberModalBtn">Add Member</button>


<!-- Add Member Modal -->
<div id="addMemberModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddMemberModalBtn">&times;</span>
        <h2>Add Member</h2>
        <hr>
        <form id="addMemberForm">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required>

            <input type="submit" value="Add Member">
        </form>
        
    </div>
</div>
</div>



    </main>






  <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="img/slsuto.png" alt="logo" />
            <h1>WanderLust</h1>
            <img src="img/canigs.png" alt="logo" /> 
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>
        <br><br>

        <div class="sidebar__menu">
          <div class="sidebar__link  ">
            <i class="fa fa-home "></i>
            <a href="adminindex.php">Dashboard</a>
          </div>
          <h2>MANAGEMENT</h2>
          
        
          <div class="sidebar__link active_menu_link ">
            <i class="fa fa-building-o "></i>
            <a href="ausermanagement.php">Ticketing Agent Account</a>
          </div>
          
          <div class="sidebar__link">
            <i class="fa fa-money "></i>
             <a href="prices.php">Prices</a>
          </div>

          <h2>MAINTENANCE MANAGEMENT</h2>
          <div class="sidebar__link">
            <i class="fa fa-ship "></i>
            <a href="#">Boat</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="#">Cottage</a>
          </div>
         
          
          <h2>Monthly Report</h2>
         
          <div class="sidebar__link">
            <i class="fa fa-line-chart fa-2x text-red"></i>
            <a href="#">Revenue</a>
          </div>
          <hr>
          <div class="sidebar__logout">
            <i class="fa fa-power-off fa-2x text-red"></i>
            <a href="#">Log out</a>
          </div>
          <h2></h2>
          <div class="sidebar__link">
           
            <a href="#"></a>
          </div>
          <div class="sidebar__link">
           
            <a href="#"> </a>
          </div>
         
        </div>
      </div>
    </div>


<!-- Footer -->
<footer>
    <p>&copy; 2023 Wander Lust Ticketing System</p>
</footer>




    <!-- Add this script just before the closing </body> tag in your HTML -->
<script>
   var openAddMemberModalBtn = document.getElementById('openAddMemberModalBtn');
    var closeAddMemberModalBtn = document.getElementById('closeAddMemberModalBtn');
    var addMemberModal = document.getElementById('addMemberModal');

    openAddMemberModalBtn.onclick = function() {
        addMemberModal.style.display = 'flex';
    }

    closeAddMemberModalBtn.onclick = function() {
        addMemberModal.style.display = 'none';
    }

    var openEditMemberModalBtn = document.getElementById('openEditMemberModalBtn');
    var closeEditMemberModalBtn = document.getElementById('closeEditMemberModalBtn');
    var editMemberModal = document.getElementById('editMemberModal');

    openEditMemberModalBtn.onclick = function() {
        editMemberModal.style.display = 'flex';
    }

    closeEditMemberModalBtn.onclick = function() {
        editMemberModal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target === addMemberModal) {
            addMemberModal.style.display = 'none';
        } else if (event.target === editMemberModal) {
            editMemberModal.style.display = 'none';
        }
    }
</script>



<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="admin.js"></script>

<script src="modaladd.js"></script
<!-- Bootstrap JavaScript -->
<!-- Include Bootstrap JavaScript at the end of the body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/{your-bootstrap-version}/js/bootstrap.min.js"></script>


</body>
</html>
