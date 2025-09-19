# backend

# PHP Backend for Contact Form

## Structure
- All PHP files are in the `public/` directory (Render requirement).
- Main entry: `public/index.php`

## Deploying to Render
1. Push this repo to GitHub.
2. Go to [Render.com](https://render.com/), create a new Web Service, and connect your repo.
3. Render will auto-detect the `render.yaml` and deploy your PHP app.
4. Your backend will be available at the URL Render provides.

## Connecting from React
- Use the Render URL as your API endpoint for POST requests.
- Example:
  ```js
  fetch('https://your-render-url.onrender.com', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ name, email, message })
  })
  ```

## Notes
- Change `your-email@example.com` in `index.php` to your real email.
- Make sure to set up email sending (Render supports PHP's `mail()` but you may need to configure sender email or use a service like SMTP for production reliability).