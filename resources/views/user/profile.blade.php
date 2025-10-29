<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile - MedNest</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
    }

    .profile-container {
      max-width: 900px;
      margin: 50px auto;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
      border-bottom: 1px solid #e0e0e0;
      padding-bottom: 20px;
      flex-wrap: wrap;
    }

    .profile-header img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #7B0707;
    }

    .profile-header h2 {
      margin: 0;
      color: #333;
    }

    .profile-header p {
      margin: 5px 0 0;
      color: #777;
    }

    .profile-info {
      margin-top: 30px;
    }

    .profile-info h3 {
      color: #7B0707;
      margin-bottom: 10px;
      font-size: 18px;
      border-bottom: 2px solid #7B0707;
      display: inline-block;
      padding-bottom: 4px;
    }

    .profile-info p {
      margin: 8px 0;
      color: #555;
      font-size: 14px;
      word-wrap: break-word;
    }

    .appointment-history {
      margin-top: 30px;
      overflow-x: auto;
    }

    .appointment-history h3 {
      color: #7B0707;
      margin-bottom: 10px;
      font-size: 18px;
      border-bottom: 2px solid #7B0707;
      display: inline-block;
      padding-bottom: 4px;
    }

    .appointment-history table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      border-radius: 8px;
      overflow: hidden;
    }

    .appointment-history th, .appointment-history td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      font-size: 14px;
      white-space: nowrap;
    }

    .appointment-history th {
      background-color: #7b0707;
      color: #fff;
      font-weight: 600;
    }

    .appointment-history tr:last-child td {
      border-bottom: none;
    }

    /* ✅ Status color styles */
    .status-completed {
      color: #28a745; /* green */
      font-weight: 600;
    }

    .status-pending {
      color: #d52141; /* red */
      font-weight: 600;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .profile-container {
        margin: 30px 20px;
        padding: 20px;
      }

      .profile-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .profile-header img {
        width: 100px;
        height: 100px;
      }

      .profile-header h2 {
        font-size: 22px;
      }

      .profile-info h3,
      .appointment-history h3 {
        font-size: 16px;
      }

      .profile-info p,
      .appointment-history td,
      .appointment-history th {
        font-size: 13px;
      }
    }

    @media (max-width: 480px) {
      .profile-container {
        padding: 15px;
      }

      .profile-header img {
        width: 80px;
        height: 80px;
      }

      .profile-header h2 {
        font-size: 20px;
      }

      .profile-info h3,
      .appointment-history h3 {
        font-size: 15px;
      }

      .profile-info p,
      .appointment-history td,
      .appointment-history th {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="profile-header">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Picture">
      <div>
        <h2>Jane Doe</h2>
        <p>Email: jane.doe@example.com</p>
        <p>Phone: +63 912 345 6789</p>
      </div>
    </div>

    <div class="profile-info">
      <h3>Personal Information</h3>
      <p><strong>Age:</strong> 28</p>
      <p><strong>Gender:</strong> Female</p>
      <p><strong>Address:</strong> Barangay San Roque, Albay</p>
      <p><strong>Last Menstrual Period (LMP):</strong> September 10, 2025</p>
    </div>

    <div class="appointment-history">
      <h3>Appointment History</h3>
      <table>
        <tr>
          <th>Date</th>
          <th>Service</th>
          <th>Status</th>
        </tr>
        <tr>
          <td>October 1, 2025</td>
          <td>Pre-natal Check-up</td>
          <td class="status-completed">Completed</td>
        </tr>
        <tr>
          <td>October 15, 2025</td>
          <td>Ultrasound</td>
          <td class="status-pending">Pending</td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>
