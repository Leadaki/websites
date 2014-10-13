<?php

$baseUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], '/install'));
$configFilePath = __DIR__ . '/../config/config.php';

if (isset($_POST['config'])) {

    require __DIR__ . '/../config/config.php.dist';
    require __DIR__ . '/../vendor/autoload.php';

    $status = array(
        'isSuccess' => false,
        'message' => null,
    );

    $config = array_merge($config, $_POST['config']);

    $configContent = file_get_contents(__DIR__ . '/../config/config.php.dist');

    $apiSitePath = $config['api']['base_url'] . '/' . $config['app']['website_id'];

    try {
        $loadSiteDataService = new \Leadaki\Frontend\Service\LoadSiteDataService($apiSitePath, array('cacheValid' => 0));
    } catch (Exception $e) {
        $status['message'] = $e->getMessage();
    }

    if (null === $status['message']) {

        $configContent = preg_replace(
            '/(\[\'website_id\'\] = )\'\'/',
            sprintf('$1\'%s\'', $config['app']['website_id']),
            $configContent
        );
        $configContent = preg_replace(
            '/(\[\'base_url\'\] = )\'\'/',
            sprintf('$1\'%s\'', $config['app']['base_url']),
            $configContent
        );

        if (!file_exists($configFilePath) || isset($_POST['overwrite'])) {
            if (is_writable(__DIR__ . '/..config/')) {
                file_put_contents($configFilePath, $configContent);
                $status['isSuccess'] = true;
            } else {
                $status['isSuccess'] = true;
                $status['message'] = $configContent;
            }
        } else {
            $status['message'] = 'Config file exists. Check overwrite option to overwrite config file';
        }
    }

}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Leadaki Install</title>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if (isset($status) && $status['isSuccess']): ?>
            <?php if(null === $status['message']): ?>
            <div class="jumbotron" style="margin-top: 20px;">
                    <h1>Success!</h1>
                    <p>Your website is installed</p>
                    <a class="btn btn-primary" href="<?php echo $config['app']['base_url']; ?>">Go to website!</a>
                    <div class="alert alert-danger" style="margin-top: 20px;">
                        <strong>Important!</strong> Remove install folder
                    </div>
            </div>
            <?php else: ?>
                <div class="well">
                    <p class="lead">Impossible write config file. create a new php file, paste the next code and save as <strong>config/config.php</strong></p>
                    <textarea class="form-control" rows="20"><?php echo $status['message']; ?></textarea>
                    <div class="alert alert-danger" style="margin-top: 20px;">
                        <strong>Important!</strong> Remove install folder
                    </div>
                </div>
            <?php endif; ?>
            <?php else: ?>
            <h1>Leadaki Install</h1>
            <p>Assistant to install and configure Leadaki site.</p>
            <form role="form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <legend>App</legend>

                    <?php if (isset($status) && !$status['isSuccess']): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $status['message']; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="config-app-website_id" class="col-sm-2 control-label">Website ID</label>
                        <div class="col-sm-10">
                            <input
                                class="form-control"
                                type="text"
                                id="config-app-website_id"
                                name="config[app][website_id]"
                                value="<?php echo isset($_POST['config']['app']['website_id']) ? $_POST['config']['app']['website_id'] : ''; ?>"
                            />
                            <p class="help-block">Leadaki API website ID</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="config-app-base_url" class="col-sm-2 control-label">Base URL</label>
                        <div class="col-sm-10">
                            <input
                                class="form-control"
                                type="text"
                                id="config-app-base_url"
                                name="config[app][base_url]"
                                placeholder="<?php echo $baseUrl; ?>"
                                value="<?php echo isset($_POST['config']['app']['base_url']) ? $_POST['config']['app']['base_url'] : $baseUrl; ?>"
                            />
                            <p class="help-block">URL where it was installed on site</p>
                        </div>
                    </div>

                    <?php if (file_exists($configFilePath)): ?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="overwrite" id="overwrite"/> Config file exist. Overwrite?
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                </fieldset>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Install</button>
                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
