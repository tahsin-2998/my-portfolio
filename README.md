# 🚀 Syed Tahsin Ahmed — Full-Stack Laravel Portfolio

Welcome to the official repository of my personal portfolio and web application. Built from the ground up to showcase my journey, technical skills, and featured projects as an aspiring Software Engineer and Full-Stack Laravel Developer.

---

## 🛠️ Built With

- **Backend:** PHP 8+, Laravel Framework, Eloquent ORM
- **Frontend:** Blade Templating, HTML5, Modern CSS (Custom CSS Variables, Dark/Light Mode Support)
- **Database:** MySQL
- **Mail System:** Gmail SMTP (App Password integration for contact inquiries)
- **Environment:** Fedora Linux Local Development Setup

---

## 📂 Project Structure & Features

- **Dynamic Project Archive:** Fetches featured projects dynamically on the homepage (with an asymmetric grid layout) and lists all projects on a dedicated archive route (`/projects`).
- **Secure Contact Form:** Fully functional contact form with input validation, database storage (`contact_messages`), and automated email notifications sent directly via SMTP.
- **Interactive UI/UX:** Responsive mobile navigation drawer, Intersection Observer-based active link highlighting, and seamless dark/light theme switching.

---

## ⚙️ Getting Started Locally

To run a copy of this project locally on your machine, follow these steps:

### 1. Clone the Repository

```bash
git clone [https://github.com/tahsin-2998/your-repo-name.git](https://github.com/tahsin-2998/your-repo-name.git)
cd your-repo-name
```

### 2. Install Dependencies

```bash

composer install
npm install
```

### 3. Configure Environment File

Copy the example environment configuration file and generate your application key:

```Bash

cp .env.example .env
php artisan key:generate
```

### 4. Configure Database & Mail

Open your newly created .env file and update your database and mail credentials:

```Code snippet

DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_gmail_app_password
MAIL_ENCRYPTION=tls
```

### 5. Run Migrations

```Bash

php artisan migrate
```

### 6. Start the Local Development Server

```Bash

php artisan serve
```

Open your browser and visit http://127.0.0.1:8000.

---

## 📄 License

This project is open-source and available under the MIT License.

<ElicitationsGroup message="If you need help adding badges or screenshots to your README:">
  <Elicitation label="Add project badges" query="How can I add build status or technology badges to the top of my README?"/>
  <Elicitation label="Add screenshots section" query="How do I add screenshots of my portfolio to the README markdown file?"/>
</ElicitationsGroup>
