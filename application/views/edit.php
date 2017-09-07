<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Requisites
        </title>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/editform.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/formstyle.css">    
    </head>
    <body>
        <header>           
            <center>
                <h1>
                    Trinity University of Asia
                </h1>
            </center>
        </header>
    <div class="btns">
        <button class="buttonprq" id="hideco"><span>Add Prerequisite</span></button>
        <button class="buttoncrq" id="hidepre"><span>Add Corequisite</span></button>
        <br/>
        <a href="<?php echo site_url('Triune_sample/viewsubj')?>" class="link">Cancel</a>
    </div>
        
    <div class="coreq">
    <form method="post" action="<?php echo base_url();?>index.php/Triune_sample/insertCoreq" id="crq">    
        <h3>Select Course Code:</h3>
        <select id="coursecrq" name="course">
            <option value="" selected="selected">---Select Course Code---</option>
            <?php foreach ($course as $row4): ?>
            <option label="<?php echo $row4['CourseCode']; ?>" value="<?php echo $row4['CourseCode']; ?>" <?php echo set_select('course', $row4['CourseCode'], False); ?>> <?php echo $row4['CourseCode'] ; ?> </option>
                <?php endforeach; ?>
        </select>
        
        <div class="sycrqhide">
        <h3>Select SY:</h3>
        <select id="sycrq" name="sy">
            <option value="" selected="selected">---Select SY---</option>
        </select>
        </div>
        
        <div class="subjcodecrqhide">
        <h3>Select Subject Code:</h3>
        <select id="subjcodecrq" name="subjcode">
            <option value="" selected="selected">---Select Subject Code---</option>
        </select>
        </div>

        <br/>
        <h3>Select Co-Requisite:</h3>
        <select id="coreq" name="coreq">
            <option value="" selected="selected">---Select Co-Requisite---</option>
            <?php foreach ($result as $row2): ?>
            <option label="<?php echo $row2['Coreq']; ?>" value="<?php echo $row2['Coreq']; ?>" <?php echo set_select('coreq', $row2['Coreq'], False); ?>> <?php echo $row2['Coreq'] ; ?> </option>
            <?php var_dump($row2)?>
                <?php endforeach; ?>
        </select>
                
        <br/>
        <br/>
        
        <div class="buttonholder">
        <input type="Submit" value="Submit" id="submitreqcrq">  
        </div>
    </form>
    </div>    
    
    <div class="prereq">    
    <form method="post" action="<?php echo base_url();?>index.php/Triune_sample/insertPrereq" id="prq">    
        <h3>Select Course Code:</h3>
        <select id="courseprq" name="course">
            <option value="" selected="selected">---Select Course Code---</option>
            <?php foreach ($course as $row4): ?>
            <option label="<?php echo $row4['CourseCode']; ?>" value="<?php echo $row4['CourseCode']; ?>" <?php echo set_select('course', $row4['CourseCode'], False); ?>> <?php echo $row4['CourseCode'] ; ?> </option>
            <?php endforeach; ?>
        </select>
        
        <div class="syprqhide">
        <h3>Select SY:</h3>
        <select id="syprq" name="sy">
            <option value="" selected="selected">---Select SY---</option>
        </select>
        </div>
        
        <div class="subjcodeprqhide">
        <h3>Select Subject Code:</h3>
        <select id="subjcodeprq" name="subjcode">
            <option value="" selected="selected">---Select Subject Code---</option>
        </select>
        </div>

        <br/>

        <h3>Select Pre-Requisite:</h3>
        <select id="prereq" name="prereq">
            <option value="" selected="selected">---Select Pre-Requisite---</option>
            <?php foreach ($prereq as $row5): ?>
            <option label="<?php echo $row5['Prereq']; ?>" value="<?php echo $row5['Prereq']; ?>" <?php echo set_select('prereq', $row5['Prereq'], False); ?>> <?php echo $row5['Prereq'] ; ?> </option>
            <?php endforeach; ?>
        </select>
        
        <br/>
        <br/>
        
        <div class="buttonholder">
        <input type="Submit" value="Submit" id="submitreqprq">
        </div>
        </form>
        </div>
    </body>
</html>