<?php
/**
 * User: BenHuang
 * Email: benhuang1024@gmail.com
 * Date: 2019-01-01
 * Time: 00:01
 */

$laravel_plus_basename = basename(__DIR__);
$remove_excess_files = [
    'composer.lock',
    '.travis',
    '_config.yml',
];
$remove_excess_dirs = [
    'vendor',
    '.github',
];


/**
 *
 */
function testProjectStart(): void
{
    if (is_file(__DIR__ . ".env")) {
        die("error: have .env file" . PHP_EOL);
    }
}

/**
 * @param string $laravel_plus_basename
 */
function checkProjectDirectory(string $laravel_plus_basename): void
{
    if ("LaravelPlus" !== $laravel_plus_basename || "laravel-plus" !== $laravel_plus_basename) {
        echo "error: Error original project path " . $laravel_plus_basename . PHP_EOL;
        die;
    }
}

/**
 * @param string $laravel_plus_basename
 *
 * @return mixed
 */
function checkRequestVariable(string $laravel_plus_basename): mixed
{
    global $argv;
    if ($argv && isset($argv[1])) {
        $product = $argv[1];
    } else {
        echo "error: No project name set" . PHP_EOL;
        echo "eg): php {$laravel_plus_basename}/copy.php YourProject" . PHP_EOL;
        die;
    }
    return $product;
}

/**
 * @param string $laravel_plus_basename
 */
function removeExcessFileInNewProject(string $laravel_plus_basename): void
{
    global $remove_excess_files, $remove_excess_dirs;
    foreach ($remove_excess_files as $remove_excess_file) {
        if (is_file("{$laravel_plus_basename}/{$remove_excess_file}")) {
            exec("rm {$laravel_plus_basename}/{$remove_excess_file}");
        }
    }
    foreach ($remove_excess_dirs as $remove_excess_dir) {
        if (is_file("{$laravel_plus_basename}/{$remove_excess_dir}")) {
            exec("rm {$laravel_plus_basename}/{$remove_excess_dir}/*");
        }
    }
}

/**
 * @param string $laravel_plus_basename
 * @param        $product
 */
function copyHideFile(string $laravel_plus_basename, $product): void
{
    $hidden_files = [
        ".env.example",
        ".gitattributes",
        ".gitignore",
    ];
    foreach ($hidden_files as $hidden_file) {
        exec("cp {$laravel_plus_basename}/{$hidden_file} {$product}/{$hidden_file}");
    }
    exec("cp {$product}/.env.example {$product}/.env");
}

/**
 * @param $product
 */
function removeThisFile($product): void
{
    if (is_file("{$product}/copy.php")) {
        exec("rm {$product}/copy.php");
    }
}

/**
 * @param string $laravel_plus_basename
 *
 * @return mixed
 */
function handle(string $laravel_plus_basename)
{
    testProjectStart();
    exec("cd {$laravel_plus_basename}");
    checkProjectDirectory($laravel_plus_basename);
    $product = checkRequestVariable($laravel_plus_basename);
    removeExcessFileInNewProject($laravel_plus_basename);
    exec("cp -r {$laravel_plus_basename}/* {$product}");
    removeThisFile($product);
    copyHideFile($laravel_plus_basename, $product);
    exec("cd {$product}");
    echo "success" . PHP_EOL;
}

handle($laravel_plus_basename);




