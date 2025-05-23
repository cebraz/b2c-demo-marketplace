# Spryker B2C Demo Marketplace
[![Build Status](https://github.com/spryker-shop/b2c-demo-marketplace/workflows/CI/badge.svg)](https://github.com/spryker-shop/b2c-demo-marketplace/actions?query=workflow%3ACI)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/spryker-shop/b2c-demo-marketplace/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/spryker-shop/b2c-demo-marketplace/?branch=master)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.2-8892BF.svg)](https://php.net/)

## Description

Spryker B2C Demo Marketplace is a collection of Spryker B2C-specific marketplace features. It suits most projects as a starting point of development and can be used to explore Spryker.

## B2C Demo Marketplace quick start

This section describes how to get started with the B2C Demo Marketplace quickly.

For detailed installation instructions, see [Install Spryker](https://docs.spryker.com/docs/dg/dev/set-up-spryker-locally/install-spryker/install-spryker.html).

### Prerequisites

For full installation prerequisites, see one of the following:
* [Install Docker prerequisites on MacOS](https://docs.spryker.com/docs/dg/dev/set-up-spryker-locally/install-spryker/install-docker-prerequisites/install-docker-prerequisites-on-macos.html)
* [Install Docker prerequisites on Linux](https://docs.spryker.com/docs/dg/dev/set-up-spryker-locally/install-spryker/install-docker-prerequisites/install-docker-prerequisites-on-linux.html)
* [Install Docker prerequisites on Windows](https://docs.spryker.com/docs/dg/dev/set-up-spryker-locally/install-spryker/install-docker-prerequisites/install-docker-prerequisites-on-windows-with-wsl2.html)

Recommended system requirements for MacOS:

|Macbook type	|vCPU	|RAM|
|---|---|---|
|15'|	4	|6GB|
|13'|	2	|4GB|

### Install the B2C Demo Marketplace

1. Create a project folder and clone the B2C Demo Marketplace and the Docker SDK:
```bash
mkdir spryker-b2c-marketplace && cd spryker-b2c-marketplace
git clone https://github.com/spryker-shop/b2c-demo-marketplace.git ./
git clone git@github.com:spryker/docker-sdk.git docker
```

2. Set up a desired environment:
  * [Set up a development environment](#set-up-a-development-environment)
  * [Set up a production-like environment](#set-up-a-production-like-environment)

#### Set up a development environment

1. Bootstrap the docker setup:

```bash
docker/sdk boot deploy.dev.yml
```

2. If the command you've run in the previous step returned instructions, follow them.

3. Build and start the instance:
```bash
docker/sdk up
```

4. Switch to your branch, re-build the application with assets and demo data from the new branch:

```bash
git checkout {your_branch}
docker/sdk boot -s deploy.dev.yml
docker/sdk up --build --assets --data
```

> Depending on your requirements, you can select any combination of the following `up` command attributes. To fetch all the changes from the branch you switch to, we recommend running the command with all of them:
> - `--build` - update composer, generate transfer objects, etc.
> - `--assets` - build assets
> - `--data` - get new demo data

You've set up your Spryker B2C Demo Marketplace and can access your applications.


### Set up a production-like environment

1. Bootstrap the docker setup:

```bash
docker/sdk boot -s
```

2. If the command you've run in the previous step returned instructions, follow them.

3. Build and start the instance:
```bash
docker/sdk up
```

4. Switch to your branch in one of the following ways:

  * Switch to your brunch, re-build the application with assets and demo data from the new branch:

  ```bash
  git checkout {your_branch}
  docker/sdk boot -s
  docker/sdk up --assets --data
  ```

  * Light git checkout:

  ```bash
  git checkout {your_branch}
  docker/sdk boot -s

  docker/sdk up
  ```

  > Depending on your requirements, you can select any combination of the following `up` command attributes. To fetch all the changes from the branch you switch to, we recommend running the command with all of them:
  > - `--build` - update composer, generate transfer objects, etc.
  > - `--assets` - build assets
  > - `--data` - get new demo data

5. Reload all the data:

```bash
docker/sdk clean-data && docker/sdk up && docker/sdk console q:w:s -v -s
```


You've set up your Spryker B2C Demo Marketplace and can access your applications.

## Troubleshooting installation of the B2C Demo Marketplace

This section describes the most common issues related to the installation of the B2C Demo Marketplace.

For a complete troubleshooting, see [Troubleshooting Spryker installation issues](https://docs.spryker.com/docs/dg/dev/set-up-spryker-locally/troubleshooting-installation/an-error-during-front-end-setup.html).

**when**

You get unexpected application behavior or errors.

**then**

1. Check the state of the directory:
```bash
git status
```

2. If there are untracked files (returned in red), and they are not necessary, remove them.

3. Restart file synchronization and rebuild the codebase:
```bash
docker/sdk trouble
docker/sdk boot -s deploy.dev.yml
docker/sdk up --build --assets
```

**when**
You do not see the expected demo data on the Storefront.

**then**

1. Open the [queue broker](http://queue.spryker.local) and wait until all the queues are empty.

2. If the queues are empty, and the issue persists, reload the demo data:
```bash
docker/sdk trouble
docker/sdk boot -s deploy.dev.yml
docker/sdk up --build --assets --data
```

## Contributing to the repository

For contribution guidelines, see [Code contribution guide](https://docs.spryker.com/docs/dg/dev/code-contribution-guide.html).
