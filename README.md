Find and replace on the name in all the templates. Make sure to Match Case & Match Whole Word.

1. Search for `keach-` to capture prefixed handles and replace with: `theme-name-here-`.
2. Search for `'keach'` (inside single quotations) to capture the text domain and replace with: `'theme-name-here'`.
3. Search for `keach` (in lowercase) to capture the text domain and replace with: `theme-name-here`.
4. Search for `keach` (in camel case) to capture the class names and replace with: `Theme Name Here`.
5. Search for `keach_` (in uppercase) to capture constants and replace with: `THEME_NAME_HERE_`.

- Update fonts needed (if using non-locally stored fonts) in `functions.php`.
- Update the links in `footer.php` with your own information.
- Delete this readme.
