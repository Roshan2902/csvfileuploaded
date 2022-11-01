<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desplay whole data</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style type="text/css">
      .search-rank label{
        font-size: 18px;
        font-weight: 600;
      }
      .search-rank input{
        font-size: 18px;
        font-weight: 500;
        margin-left: 2vw;
      }
      .s-button{
        margin-left: 0vw !important;
      }
    </style>

</head>
<body>
    
    
    <div class="container main-content">

        <h1>Data</h1>

        <form action="" method="POST" enctype="multipart/form-data">
          <div class="search-rank my-5">
            <label for="">Enter your rank</label>
            <input type="search " name="search">
            <input class="s-button" type="submit" name="submit" value="Search" id="">
          </div>
        </form>

        <?php
        include_once 'db.php';
        if(isset($_POST['submit']))
        {
          $srank= $_POST['search'];

        if($srank)
          {
          $selectquery =" select * from rank where opening_rank>=$srank";
          $query = mysqli_query($conn, $selectquery);
          $num = mysqli_num_rows($query);
        ?>

<div class="table-responsive">
  <table class=" table table-border table-striped text-center "  >
    <tr>
      <th>S No.</th>
      <th>Institute Code</th>
      <th>Institute</th>
      <th>Program</th>
      <th>Category</th>
      <th>Quota</th>
      <th>Opening Rank</th>
      <th>Closing Rank</th>
    </tr>

    <?php
      $i=0;
      while($res = mysqli_fetch_array($query))
      {
        ?>
      <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $res['institute_code']; ?></td>
        <td><?php echo $res['institute']; ?></td>
        <td><?php echo $res['program']; ?></td>
        <td><?php echo $res['category']; ?></td>
        <td><?php echo $res['quota']; ?></td>
        <td><?php echo $res['opening_rank']; ?></td>
        <td><?php echo $res['closing_rank']; ?></td>
      </tr>
      
        <?php
      } 
    }
  }

        
      ?>
    </table> 
  </div>

</body>
</html>