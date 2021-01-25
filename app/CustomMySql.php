<?php

namespace App;
use Spatie\DbDumper\Databases\MySql;
use Symfony\Component\Process\Process;

class CustomMySql extends MySql {
    /**
     * @param string $dumpFile
     * @return Process
     */
    public function getProcess(string $dumpFile): Process
    {
        $tempFileHandle = fopen(storage_path("app". DIRECTORY_SEPARATOR ."custom-temp.tmp"), "w+");
        fwrite($tempFileHandle, $this->getContentsOfCredentialsFile());
        $temporaryCredentialsFile = stream_get_meta_data($tempFileHandle)['uri'];
        
        $command = $this->getDumpCommand($dumpFile, $temporaryCredentialsFile);
        fclose($tempFileHandle);
        return Process::fromShellCommandline($command, null, null, null, $this->timeout);
    }
}
