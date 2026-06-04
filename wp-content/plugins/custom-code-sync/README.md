# Custom Code Sync

Git-manage **Elementor Pro → Custom Code** snippets and the child-theme code.

Elementor stores Custom Code in the database (post type `elementor_snippet`),
so it can't be tracked by Git directly. This plugin serializes each snippet
(code + location + priority + conditions) to a JSON file under `snippets/`,
which Git *can* track. A deploy step imports those files back into the DB.

## Commands (run in the LocalWP "site shell")

```bash
# DB  ->  files   (run wherever you authored the code)
wp custom-code export

# files -> DB     (run on deploy / on other environments)
wp custom-code import

# files -> DB and remove DB snippets that no longer have a file
wp custom-code import --delete
```

After import, Elementor's cache is flushed automatically. If anything looks
stale also run: `wp elementor flush-css && wp cache flush`.

## Workflow

1. Edit Custom Code in the WP admin (one designated "authoring" environment).
2. `wp custom-code export`
3. `git add . && git commit -m "..." && git push`
4. On staging/production deploy: `git pull && wp custom-code import`

**Source of truth = Git.** Only edit Custom Code in the UI on one environment,
then export. Don't edit the same snippet on two environments or imports will
overwrite each other.
