<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TempStick Notification System</title>
      <meta name="description" content="Scan, Check, Update, Done">
      <link rel="stylesheet" href="style.css">
      <script src="script.js"></script>
   </head>
   <style>
      table, th, td {
      border: 1px solid black;
      }
   </style>
   <style type="text/css">
      #chart-container {
      width: 640px;
      height: auto;
      }
   </style>
   <body>
      <header>
         <div id="logo"><img src="logo.png">TempStick Notification System</div>
         <nav>
            <ul>
               <li><a href="index.php">Refresh</a>
               <li><a href="about-us.html">About</a>
               <li><a href="graphs.html">Charts</a>
            </ul>
         </nav>
      </header>
      <section id="pageContent">
         <main role="main">
            <article>
               <h2><strong>Overview</strong></h2>
               This program is built to bridge the TempStick sensors and AIMSystem at Murray State University.
               This interface will give a complete statistical overview of the program. To achieve this, a complex algorithm was used to fully complete server-sided tasks. To view a graphical analysis, check out the 'charts' tab.
               <br />
            </article>
            <br />
            <br />
            <article>
               <h2><strong>General</strong></h2>
               <?php
                  require 'general.php';
                  ?>
            </article>
            <br />
            <br />
            <article>
               <h3>
               Graphical Analysis</h3>
               <div id="chart-container">
                  <canvas id="mycanvas"></canvas>
                  <p>
                     <script type="text/javascript" src="jquery.min.js"></script>
                     <script type="text/javascript" src="Chart.min.js"></script>
                     <script type="text/javascript" src="apps.js"></script>
                  </p>
               </div>
            </article>
         </main>
         <aside>
            <div>
               <h1>Status</h1>
               <br />
               <?php require 'processing.php'; ?>
            </div>
         </aside>
      </section>
      <footer>
         <address>
            Created by MSU students
         </address>
      </footer>
   </body>
</html>