# BAC Labs — Broken Access Control Vulnerability Labs

A collection of **7 hands-on labs** built to teach the **Broken Access Control (BAC)** vulnerability. The labs are designed for beginners and progress in difficulty, helping you understand how the vulnerability occurs, how to detect it, and how to exploit it in a safe, local environment — while also letting you trace through the source code to understand the root cause of each flaw.

---

## 🎯 About the Project

This project provides a practical training environment for understanding **Broken Access Control**, one of the most critical vulnerabilities listed in the **OWASP Top 10**. The 7 challenges vary in difficulty and scenario, allowing you to:

- Understand the core concept of the vulnerability and how it arises in code.
- Trace through the source code of each lab to identify the technical root cause.
- Practice exploiting the vulnerability hands-on in an isolated, safe environment.
- Build a solid foundation before moving on to more advanced penetration testing scenarios.

> ⚠️ **Disclaimer:** This project is intended for **educational and training purposes only** and must be used within your own local environment (localhost). Do not apply what you learn here against any system or website you are not explicitly authorized to test.

---

## 🧩 Project Structure

| Folder / File | Description |
|----------------|-------------|
| `lab-1` → `lab-9` | Seven independent labs, each representing a different BAC scenario |
| `bac.sql` | Database file required by all labs |

---

## 🛠️ Tech Stack

- **PHP** (following the **MVC** pattern — Model View Controller)
- **HTML**
- **CSS**
- **MySQL**

---

## ⚙️ Requirements

Before you start, make sure you have the following installed:

- PHP (7.4 or newer recommended)
- MySQL / MariaDB
- A local server (PHP built-in server, XAMPP, Laragon, or similar)

---

## 🚀 Installation & Setup

### 1️⃣ Import the Database

Run the following command to create and populate the `bac` database:

```bash
mysql -u root -p bac < bac.sql
```

> If the `bac` database doesn't exist yet, create it first:
> ```sql
> CREATE DATABASE bac;
> ```

### 2️⃣ Run the Local Server

Navigate to the `Public` folder of the lab you want to run:

```bash
cd lab-BAC/lab-1/Public/
php -S localhost:80
```

### 3️⃣ Open the Project in Your Browser

Once the server is running, open your browser and go to:

```
http://localhost/
```

From there, you can start exploring and solving the challenge.

---

## 📚 Suggested Usage

1. Start with `lab-1` and work your way up to `lab-7` — the labs increase in difficulty progressively.
2. Try to discover the vulnerability yourself (black-box approach) before checking the source code.
3. After exploiting it, review the code to understand the root cause of the flaw.
4. Take notes on each lab: how the vulnerability was found, and how it could be fixed.

---

## 🤝 Contributing

Suggestions and improvements are always welcome. Feel free to open an Issue or a Pull Request to add new labs or improve existing ones.

---

## 📄 License

This project is intended for educational and training purposes only.
