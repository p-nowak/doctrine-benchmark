# To install

1 Install composer dependency

> composer.php install

2 Configure DB data in

> db-config.php

3 Install doctrine schema

> php vendor/bin/doctrine orm:schema-tool:create

# Run tools

Add objects (DB is not cleared automatically)
> php console.php benchmark:add --limit 100

Update objects
> php console.php benchmark:update --limit 100

# Example result

### Add 1000 Objects
Request
> php console.php benchmark:add --limit 1000

Results

`random_data Duration: 1ms MaxMemory: 3MB`

`generating_entities Duration: 93ms MaxMemory: 4.75MB`

`flush_entities Duration: 445ms MaxMemory:8.5MB`

### Add 10000 Objects
Request
> php console.php benchmark:add --limit 10000

Results

`random_data Duration: 0ms MaxMemory:3MB`

`generating_entities Duration: 736ms MaxMemory:9.25MB`

`flush_entities Duration: 4157ms MaxMemory:44.25MB`

### Retrieve and update 1000 Objects
Request
> php console.php benchmark:update --limit 1000

Results

`random_data Duration: 0ms MaxMemory:3MB`

`retrieve_entities Duration: 140ms MaxMemory:6.5MB`

`updating_entities Duration: 24ms MaxMemory:6.75MB`

`flush_entities Duration: 476ms MaxMemory:9MB`


### Retrieve and update 10000 Objects
Request
> php console.php benchmark:update --limit 10000

Results

`random_data Duration: 0ms MaxMemory:3MB`

`retrieve_entities Duration: 1260ms MaxMemory:23.75MB`

`updating_entities Duration: 275ms MaxMemory:25.25MB`

`flush_entities Duration: 6041ms MaxMemory:47.25MB`
