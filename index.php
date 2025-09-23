<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCKERIZED FIND & TEST</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            align-items: center;
            gap: 10px;
            line-height: 1.2; 
        }
        .header-logo {
            height: 5em; 
        }
        pre {
            background: #333;
            color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        .button {
            display: inline-block;
            background: rgba(0, 102, 255, 0.9);
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://raw.githubusercontent.com/R0GGER/public-iperf3-servers/refs/heads/main/iperf3serverlist_256.png" alt="iPERF3 SERVER LIST logo" class="header-logo">
            <h1>
                <span style="color: rgba(0, 102, 255, 0.9);">iPERF3</span> SERVER LIST
                <span style="display: block; color: #CCC;">DOCKERIZED FIND & TEST</span>
            </h1>
        </div>
        <p>Click the button below to find the nearest iPerf3 server and run a speed test.</p>        
        <form method="post">
            <button type="submit" name="run_test" class="button">Run Test</button>
        </form>

        <?php
        if (isset($_POST['run_test'])) {
            
            function ansi_to_html_secure($raw_string) {
                $parts = preg_split('/(\x1b\[[0-9;]*m)/s', $raw_string, -1, PREG_SPLIT_DELIM_CAPTURE);
                
                $html = '';
                $open_span = false;

                foreach ($parts as $part) {

                    if (preg_match('/^\x1b\[([0-9;]*)m$/s', $part, $matches)) {
                        
                        if ($open_span) {
                            $html .= '</span>';
                            $open_span = false;
                        }

                        $code = $matches[1];
                        $style = '';
                        switch ($code) {
                            case '1;33': $style = 'color: yellow; font-weight: bold;'; break;
                            case '0;32': $style = 'color: lime;'; break;
                            case '0;33': $style = 'color: #f9a825;'; break;
                            case '0;31': $style = 'color: red;'; break;
                            case '0':    
                            default:     
                                break;
                        }


                        if ($style) {
                            $html .= '<span style="' . $style . '">';
                            $open_span = true;
                        }
                    } else {

                        $html .= htmlspecialchars($part);
                    }
                }


                if ($open_span) {
                    $html .= '</span>';
                }

                return $html;
            }

            echo "<h2>Test Results:</h2>";
            echo "<pre>";
            
            
            $command = '/usr/local/bin/findtest.sh 2>&1 | grep -v "TERM environment variable not set."';
            $output = shell_exec($command);
            
            if ($output) {
                echo ansi_to_html_secure($output);
            } else {
                echo "Error executing the script or no output received.";
            }
            
            echo "</pre>";
        }
        ?>
    </div>
</body>
</html>
