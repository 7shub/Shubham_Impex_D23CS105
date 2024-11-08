<?php
  include 'navbar.php'; // Navbar included at the top
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shubham impex Services</title>
    <style>
        /* Basic styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
        }

        /* Main container styling */
        .main-container {
            display: flex;
            margin-top: 20px; /* Space below the navbar */
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #f5f5f5;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: block; /* Ensures sidebar is visible */
        }
        .sidebar h3 {
            color: red;
            margin-bottom: 10px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }
        .sidebar ul li:hover,
        .sidebar ul li.active {
            background-color: #ddd;
            font-weight: bold;
        }

        /* Content styling */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        h1 {
            color: #2f2f8d;
        }
    </style>
</head>
<body>

    <!-- Main Container with Sidebar and Content -->
    <div class="main-container">
        <!-- Sidebar for Services -->
        <div class="sidebar">
            <h3>All Services</h3>
            <ul>
                <li onclick="showSection('oceanCargo')">Ocean Cargo</li>
                <li onclick="showSection('airCargo')">Air Cargo</li>
                <li onclick="showSection('cargoInsurance')">Cargo Insurance</li>
                <li onclick="showSection('roadCargo')">Road Cargo</li>
                <li onclick="showSection('warehousing')">Warehousing, Storage and Distribution</li>
                <li onclick="showSection('hazardousCargo')">Dangerous Goods Hazardous Cargo</li>
                <li onclick="showSection('reeferCargo')">Reefer Cargo</li>
                <li onclick="showSection('projectCargo')">Project Cargo</li>
                <li onclick="showSection('doorDelivery')">Door Delivery Trucking</li>
                <li onclick="showSection('isoTanks')">ISO Tanks</li>
            </ul>
        </div>

        <!-- Content Section -->
        <div class="content">
            <div id="oceanCargo" class="content-section active">
                <h1>Ocean Cargo</h1>
                <p>We offer a full array of Ocean related services including Ocean Forwarding, NVOCC Consolidation or FCL container management as well as customer-in-house services. ...</p>
                <h2>Services Highlights</h2>
                <h3>Pre-Shipment Planning</h3>
                <p>We provide the shipment schedule to our customers as per their Stuffing Planning and provide them the best Rate Quote. ...</p>
            </div>
            <div id="airCargo" class="content-section">
                <h1>Air Cargo</h1>
                <p>shubham impex is a global solutions provider and a driving force in the delivery of first class, fully integrated connections worldwide for all your airfreight needs. ...</p>
            </div>
            <div id="cargoInsurance" class="content-section">
                <h1>Cargo Insurance</h1>
                <p>Details about Cargo Insurance services.</p>
            </div>
            <div id="roadCargo" class="content-section">
                <h1>Road Cargo</h1>
                <p>Details about Road Cargo services.</p>
            </div>
            <div id="warehousing" class="content-section">
                <h1>Warehousing, Storage and Distribution</h1>
                <p>Details about Warehousing, Storage and Distribution services.</p>
            </div>
            <div id="hazardousCargo" class="content-section">
                <h1>Dangerous Goods Hazardous Cargo</h1>
                <p>Details about Dangerous Goods Hazardous Cargo services.</p>
            </div>
            <div id="reeferCargo" class="content-section">
                <h1>Reefer Cargo</h1>
                <p>Details about Reefer Cargo services.</p>
            </div>
            <div id="projectCargo" class="content-section">
                <h1>Project Cargo</h1>
                <p>Details about Project Cargo services.</p>
            </div>
            <div id="doorDelivery" class="content-section">
                <h1>Door Delivery Trucking</h1>
                <p>Details about Door Delivery Trucking services.</p>
            </div>
            <div id="isoTanks" class="content-section">
                <h1>ISO Tanks</h1>
                <p>Details about ISO Tanks services.</p>
            </div>
        </div>
    </div>

    <!-- JavaScript for Section Display -->
    <script>
        function showSection(sectionId) {
            // Hide all sections
            var sections = document.querySelectorAll('.content-section');
            sections.forEach(function(section) {
                section.classList.remove('active');
            });

            // Remove active class from all sidebar items
            var items = document.querySelectorAll('.sidebar ul li');
            items.forEach(function(item) {
                item.classList.remove('active');
            });

            // Show the selected section and highlight the selected sidebar item
            document.getElementById(sectionId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>

</body>
</html>
