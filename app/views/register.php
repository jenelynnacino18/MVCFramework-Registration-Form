<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MVC Registration</title>
    <link rel="stylesheet" href="<?php echo URLROOT?>/public/assets/css/style.css">
</head>
<body id="register">
    <div class="registration">
        <div class="registration-grid-col-1">
            <div class="registration-form">
                <div class="header">
                    <label for="">registration</label>
                </div>
                <form action="<?php echo URLROOT ?>/register" method="post" class="input-form">
                    <!-- <div class="error-div"> -->
                        <label for="" class="error"><?php echo $data['error']; ?></label>
                    <!-- </div> -->
                    <input type="hidden" name="regUID" value="<?php echo $data['regUID']?>">
                    <div class="reg-fullname">
                        <input type="text" placeholder="fullname" name="regFullname">
                    </div>
                    <div class="reg-birthdate">
                        <select name="regBMonth">
                            <option value="Month" class="option-1">Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <input type="text" placeholder="day" name="regBDay">
                        <input type="text" placeholder="year" name="regBYear">
                    </div>
                    <div class="reg-sex-nationality">
                        <input type="text" placeholder="sex" name="regSex">
                        <input type="text" placeholder="nationality" name="regNationality">
                    </div>
                    <div class="reg-mobile-number">
                        <input type="text" placeholder="mobile number" name="regMNumber">
                    </div>
                    <div class="reg-complete-add">
                        <input type="text" placeholder="complete address" name="regCAddress">
                    </div>
                    <div class="reg-email">
                        <input type="email" placeholder="email" name="regEmail">
                    </div>
                    <div class="signup-button">
                        <button>register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <label for="">JENELYN A. NACINO | FOR EDUCATIONAL PURPOSES ONLY</label>
    </div>
</body>
</html>