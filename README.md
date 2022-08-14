# About

As part of creating a solution that solves the multitude of problems faced by 
corporate sales departments, we designed and created a web application that centralizes the entire workflow of sales teams under a single roof.

An application that integrates all the responsibilities of the sales team managers, as 
well as their teleoperators, would be extremely beneficial to all companies, large or 
small. It would make workflows easier and faster, increase productivity and maximize 
value.

Our solution, hosted on the web at www.estfbs.ga allows sales team managers to 
manage their teleoperators, track their progress, performance and efficiency, as well 
as manage the inventory of all company products, and create call scripts to guide 
teleoperators through the sales process. And as for the teleoperators, it gives them 
access to an easy-to-use interface to help them make calls and record their results.

To learn more about the application, feel free to check out the application repport: https://bit.ly/3duGsDw (Note: Currently, it's only available in French)

# Application link

Visit www.estfbs.ga to use the application.

# Local deployement

Follow these steps to run this app locally:
1. Clone the repo with `git clone https://github.com/Issam-Boubcher/PhoneJobing.git`.
2. CD to the repo and run `composer install` and `npm install`.
3. Run `cp .env.example .env`.
4. Provide your Amazon S3 connection variables (`AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_DEFAULT_REGION`, `AWS_BUCKET`, `AWS_USE_PATH_STYLE_ENDPOINT`) in your `.env` file.
5. Provide your database's connection variables (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) in your `.env` file.
6. Run `php artisan key:generate`.
7. Run `php artisan storage:link`.
8. Run `php artisan migrate:fresh --seed`.
9. Run `php artisan serve` and open another terminal and CD to the repo then run `npm run watch`.
10. Visit http://localhost:8000 to use the application locally.

