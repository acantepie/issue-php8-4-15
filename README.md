# Install

Clone repo

```bash
git clone https://github.com/acantepie/issue-php8-4-15.git 
```

Start docker compose
```bash
cd issue-php8-4-15/
docker compose up
```

Init and populate db
```bash
docker compose exec php bin/console d:s:u --force
docker compose exec php bin/console app:populate:db
```

# Run script
```bash
docker compose exec php bin/console app:bug
```

- Script : [BugCommand.php](src/BugCommand.php)
- Related issue : https://github.com/doctrine/orm/issues/12323
