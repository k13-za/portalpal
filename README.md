<!--
SPDX-FileCopyrightText: Opinsys Oy <dev@opinsys.fi>
SPDX-License-Identifier: CC0-1.0
-->

# External Portal
A Nextcloud Dashboard widget providing a view of the current user's external sites. This app uses directly the sites provided by External sites' ( https://apps.nextcloud.com/apps/external ) API, which is thus required for meaningful usage of this app.
This app is not affiliated with the External sites app. Implementing the corresponding functionality in the External sites app would have also been a possibility - however, due to the very limited interoperability required, a separate app was chosen as a lighter solution.

Place this app in **nextcloud/apps/**

## Building the app

The app can be built by using the provided Makefile by running:

    make

This requires the following things to be present:
* make
* which
* tar: for building the archive
* curl: used if phpunit and composer are not installed to fetch them from the web
* npm: for building and testing everything JS, only required if a package.json is placed inside the **js/** folder

The make command will install or update Composer dependencies if a composer.json is present and also **npm run build** if a package.json is present in the **js/** folder. The npm **build** script should use local paths for build systems and package managers, so people that simply want to build the app won't need to install npm libraries globally, e.g.:

**package.json**:
```json
"scripts": {
    "test": "node node_modules/gulp-cli/bin/gulp.js karma",
    "prebuild": "npm install && node_modules/bower/bin/bower install && node_modules/bower/bin/bower update",
    "build": "node node_modules/gulp-cli/bin/gulp.js"
}
```


## Publish to App Store

First get an account for the [App Store](http://apps.nextcloud.com/) then run:

    make && make appstore

The archive is located in build/artifacts/appstore and can then be uploaded to the App Store.

## Running tests
You can use the provided Makefile to run all tests by using:

    make test

This will run the PHP unit and integration tests and if a package.json is present in the **js/** folder will execute **npm run test**

Of course you can also install [PHPUnit](http://phpunit.de/getting-started.html) and use the configurations directly:

    phpunit -c phpunit.xml

or:

    phpunit -c phpunit.integration.xml

for integration tests





Building NPM:
nvm install 20.18.3  # Installs Node v20.18.3 (bundles npm v10+)
npm install -g npm@9  # Downgrade npm to v9.x
nvm use 20.18.3
Building with make
make $$ make appstore


PortalPalWidgetpwd
class="app-image app-image-icon"
chown -R www-data:www-data apps-extra && chmod -R 775 apps-extra


