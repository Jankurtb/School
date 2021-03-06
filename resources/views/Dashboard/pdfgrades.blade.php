<head>
  <style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }
    body {
      margin: 0;
      padding: 0;
    }
    table {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      margin: 10px 0 0 -30px;
      width: 100vw;
     
    }
    th, td {
      border: 1px solid black;
      padding: 7px;
    }
    th {
      width:100px;
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    
    h2 {
      font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .row {
      display: flex;
      flex-direction: row;
    }
    
    
  </style>
</head>
    
    
    <body>
    
    <div class="row">
      <div class="heading">
        <h2>Angels of De Vera Learning Center </h4>
        <p>Blk 1 lot 33 phase 2 Molino Homes, <br> Molino, Cavite <br> Jankurt@angelsofdevera.com</p>
        <p>Grades Encoded</p>
      </div>
      <div class="logo">
      </div>
    </div>
    
    <table class="table">
      <thead >
        <tr>
          <th>Student Id</th>
          <th>Grade Level</th>
          <th>Section</th>
          <th>Name </th>
          <th>Grading Period</th>
          <th>Subject</th>
          <th>Grade</th>
        </tr>
      </thead>
      <tbody>
        <tbody>
          @foreach ($grade as $grades)
              <tr>
                <td>{{ $grades->student_id}}</td>
                <td>{{ $grades->gradeLevel}}</td>
                <td>{{ $grades->className}}</td>
                <td>{{ $grades->firstName}} {{ $grades->middleName}} {{ $grades->lastName}}</td>
                <td>{{ $grades->gradingperiod }}</td>
                <td>{{ $grades->subjectCode}}</td>
                <td>{{ $grades->grade}}</td>
              </tr>
          @endforeach
        </tbody>
      </tbody>
    </table>
    
    </body>