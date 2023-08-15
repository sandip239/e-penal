<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Example</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include DataTables CSS and JS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

  <style>
    /* Custom CSS */
    .sidebar {
      height: 100vh; /* Set the sidebar to take up full viewport height */
      transition: margin-left 0.3s; /* Add a smooth transition effect */
    }
    .sidebar-closed {
      margin-left: -200px; /* Hide the sidebar when closed */
    }
  </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">www.codewithmvc.com</a>
  <button class="navbar-toggler" type="button" id="sidebarToggle">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 bg-secondary sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              Tab 1
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Tab 2
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Tab 3
            </a>
          </li>
        </ul>
      </div>
    </nav>
