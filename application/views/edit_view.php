<!DOCTYPE html>
<html>
    <head>
        <title>
            Triune Colleges
        </title>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.2.1.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/datatable-bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/datatable.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/datatable.js"></script>
        <script src="<?php echo base_url(); ?>js/script.js"></script>
        <style>
            .type {
                cursor: pointer;
                white-space: nowrap;
            }
        </style>
    </head>
    <body>
        <header>
            <center>
                <h1>
                    Trinity University of Asia
                </h1>
                <a href="<?php echo site_url('Triune_sample/index')?>" class="link">Back</a>
<a href="<?php echo site_url('Triune_sample/create') ?>" class="link">Add Requisites</a>
            </center>
        </header>
    <center>
        <div id="first-datatable-output">
        <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
                <th>
                    Course Code:
                </th>
                <th>
                    SY:
                </th>
                <th>
                    Subject Code:
                </th>
                <th>
                    Co-Requisite:
                </th>
                <th>
                    Pre-requisite:
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $results_item): ?>  
            <tr>
                <td>
                    <?php echo $results_item['CourseCode']; ?>
                </td>
                <td>
                    <?php echo $results_item['SY']; ?>
                </td>
                <td>
                    <?php echo $results_item['SubjCode']; ?>
                </td>
                <td>
                    <?php echo $results_item['Coreq']; ?>
                </td>
                <td>
                    <?php echo $results_item['Prereq']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
            <center>
        <div class="paging"></div>
            </center>
        </div>
            <!--<?php //var_dump($results);?>-->
        </center>
    </body>    
</html>