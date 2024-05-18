<?php

#Modified #1.a - Lets me see everything backed up in a particular job id. RH
$sql = "SELECT DISTINCT Job.JobId as JobId, convert(Client.Name using utf8mb4) as Client,\n"
    . "  convert(Path.Path using utf8mb4),convert(File.FileName using utf8mb4),StartTime,Level,JobFiles,JobBytes\n"
    . " FROM Client,Job,File,Path WHERE Client.ClientId=Job.ClientId\n"
    . " AND JobStatus IN (\'T\',\'W\') AND Job.JobId=File.JobId\n"
    . " AND Path.PathId=File.PathId\n"
    . " AND File.FileName!=\'Rxxxyyyzzz123456789H\'\n" //Filename does not match, so everything is pulled.
    . " AND File.FileIndex > 0\n"
    . " AND Job.JobId = 36\n" //Enter the JobId that you want to see.
    . " ORDER BY Job.StartTime\n"
    . " limit 0, 10000000;";

#Modified #1.b - Lets me search for a file in a particular job id. RH
$sql = "SELECT DISTINCT Job.JobId as JobId, convert(Client.Name using utf8mb4) as Client,\n"
    . "  convert(Path.Path using utf8mb4),convert(File.FileName using utf8mb4),StartTime,Level,JobFiles,JobBytes\n"
    . " FROM Client,Job,File,Path WHERE Client.ClientId=Job.ClientId\n"
    . " AND JobStatus IN (\'T\',\'W\') AND Job.JobId=File.JobId\n"
    . " AND Path.PathId=File.PathId\n"
    . " AND convert(File.FileName using utf8mb4) like \'all_%\'\n" //Filename here.
    . " AND File.FileIndex > 0\n"
    . " AND Job.JobId = 36\n"
    . " ORDER BY Job.StartTime"
    . " limit 0, 10000000;";

#Modified #1.c - Lets me search for a particular file in any job id. RH
$sql = "SELECT DISTINCT Job.JobId as JobId, convert(Client.Name using utf8mb4) as Client,\n"
    . "  convert(Path.Path using utf8mb4),convert(File.FileName using utf8mb4),StartTime,Level,JobFiles,JobBytes\n"
    . " FROM Client,Job,File,Path WHERE Client.ClientId=Job.ClientId\n"
    . " AND JobStatus IN (\'T\',\'W\') AND Job.JobId=File.JobId\n"
    . " AND Path.PathId=File.PathId\n"
    . " AND convert(File.FileName using utf8mb4) like \'all_1-8%\'\n" //Filename here.
    . " AND File.FileIndex > 0\n"
    . " ORDER BY Job.StartTime\n"
    . " limit 0, 1000000;";
?>