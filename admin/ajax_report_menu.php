<?php include('includes/header.php'); ?>
<?php

//Include functions

//check to see if user if logged in else redirect to index page

?>
<?php 

/****************Getting  report menu to ajax *******************/


//require database class files


//instatiating our database objects



//write a statement to check if the customer id is coming in from the ajax request and write a function to send back the below report menu to ajax, you must bind using the customer id




    
  

    //Fetch the result and keep in a rows variable
    
    

    //Looping through our fetched array in row vairable. This can go anywhere in the HTML tags
    if($rows){
        
        $spending_amount = $rows['Spending_Amt'];
        
        $total_orders = 100;
        
        $total_amt_spent = $spending_amount * $total_orders;
        
        $average_amt_spent = ($total_amt_spent) / ($total_orders);
        
        
        echo '<div class="col-lg-4 col-md-6">
                            <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">100</div>
                                        <div>Total Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">' . $total_amt_spent . '</div>
                                        <div>Total Amount Spent</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div id="salary" class="col-xs-9 text-right">
                                        <div class="huge">' . $average_amt_spent . '</div>
                                                Average Amount Spent
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>';
    }






?>