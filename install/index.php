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
            <h1>Leadaki Install</h1>
            <p>Assistant to install and configure Leadaki site.</p>
            <form role="form" class="form-horizontal" action="">
                <fieldset>
                    <legend>App</legend>

                    <div class="form-group">
                        <label for="config-app-website_id" class="col-sm-2 control-label">Website ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="config-app-website_id" name="config[app][website_id]"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="config-app-base_url" class="col-sm-2 control-label">Base URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="config-app-base_url" name="config[app][base_url]"/>
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Template</legend>

                    <div class="form-group">
                        <label for="config-template-id" class="col-sm-2 control-label">Template ID</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="config-template-id" name="config[template][id]">
                                <option value="apparel">Apparel</option>
                                <option value="basic">Basic</option>
                                <option value="modern">Modern</option>
                                <option value="motors">Motors</option>
                                <option value="pixma">Pixma</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="config-template-color" class="col-sm-2 control-label">Template ID</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="config-template-color" name="config[template][color]">
                                <option value="blue">Blue</option>
                                <option value="brown">Brown</option>
                                <option value="golden">Golden</option>
                                <option value="gray">Gray</option>
                                <option value="green">Green</option>
                                <option value="magenta">Magenta</option>
                                <option value="orange">Orange</option>
                                <option value="purple">Purple</option>
                                <option value="red">Red</option>
                                <option value="teal">Teal</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Install</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
