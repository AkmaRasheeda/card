## Test Program Contents

<b>A) Programming Test</b>

Using Laravel Framework v10
- Language PHP
- PHP v8.2.7
- MySQL v8.0.33
- Css: <a href="https://demo.templatemonster.com/demo/51689.html?_gl=1*1mikfyq*_ga*NDc0ODMzOTcxLjE2OTk2MjAzMTg.*_ga_FTPYEGT5LY*MTY5OTYyMDMxOC4xLjEuMTY5OTYyNDMzNi4zMi4wLjA." target="blank">Bootstrap Template</a>
- Functional url to view default php: /default (can check in routes/web.php file)
- Total time spent: 30 minutes for backend codes, 2 hours for frontend codes
- <a href="https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/" target="blank">How to setup laravel project clone from github</a>
 
 ## 
 <b>1. Clone GitHub repo for this project locally</b>
 
 git clone https://github.com/AkmaRasheeda/card.git card

 ## 
 <b>2. cd into your project</b>
 
 cd .../card

 ## 
 <b>3. Checkout into specific branch</b>
 
 git checkout master

 ## 
 <b>4. Install laravel dependencies</b>
 
 composer install

 ##  
 <b>5. Install NPM dependencies</b>
 
 npm install

 ##  
 <b>6. Create a copy of your .env file</b>
 
 cp .env.example .env

 ##  
 <b>7. Generate an app encryption key</b>
 
 php artisan key:generate

 ##  
 <b>8. Create a database for our application</b>
 
 create 'card'

 ##  
 <b>9. In the .env file, add database information to allow Laravel to connect to the database</b>
 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=card
    DB_USERNAME=root
    DB_PASSWORD=

 ##  
 <b>10. Migrate the database</b>
 
 php artisan migrate
 
<hr>
<b>B) SQL Improvement Logic Test</b>

i). Written explanation of the logical improvement
- Total time spent: 30 minutes for trying new logical approach, 1 hour for new sql scripts

<table>
    <tr>
        <td>1. Indexing:

Ensure that the columns used in the ‘WHERE’ clause for filtering (especially those in the ‘LIKE’ conditions) are indexed. This will speed up search operations.

For example: <br>
CREATE INDEX idx_job_categories_name ON job_categories (name); <br>
CREATE INDEX idx_job_types_name ON job_types (name); <br>
CREATE INDEX idx_job_ name ON jobs (name);<br></td> 
    </tr>
    <tr><td>2. Use EXISTS:

Using ‘EXISTS’ instead of ‘LEFT JOIN’ can lead to better performance

WHERE EXISTS ( <br>
    SELECT 1 <br>
    FROM job_categories jc <br>
    WHERE  jc.id = Jobs.job_category_id AND jc.name LIKE ‘%キャビンアテンダント%‘ <br>
)  <br>
OR EXISTS ( <br>
    SELECT 1 <br>
    FROM job_types jt <br>
    WHERE  jt.id = Jobs.job_type_id AND jt.name LIKE ‘%キャビンアテンダント%‘ <br>
) <br>
OR EXISTS ( <br>
    SELECT 1 <br>
    FROM jobs j <br>
    WHERE  j.id = Jobs.id AND (j.name LIKE ‘%キャビンアテンダント%‘) <br>
) <br>
</td></tr>
</table>

------------------------- the SQL ------------------------- <br>
SELECT Jobs.id AS `Jobs__id`, <br>
Jobs.name AS `Jobs__name`, <br>
Jobs.media_id AS `Jobs__media_id`, <br> Jobs.job_category_id AS `Jobs__job_category_id`, <br> 
Jobs.job_type_id AS `Jobs__job_type_id`, <br>
Jobs.description AS `Jobs__description`, <br>
Jobs.detail AS `Jobs__detail`, <br>
Jobs.business_skill AS `Jobs__business_skill`, <br>
Jobs.knowledge AS `Jobs__knowledge`,<br>
Jobs.location AS `Jobs__location`,<br>
Jobs.activity AS `Jobs__activity`,<br>
Jobs.academic_degree_doctor AS `Jobs__academic_degree_doctor`, <br>
Jobs.academic_degree_master AS `Jobs__academic_degree_master`, <br>
Jobs.academic_degree_professional AS `Jobs__academic_degree_professional`, <br>
Jobs.academic_degree_bachelor AS `Jobs__academic_degree_bachelor`, <br>
Jobs.salary_statistic_group AS `Jobs__salary_statistic_group`, <br>
Jobs.salary_range_first_year AS `Jobs__salary_range_first_year`, <br>
Jobs.salary_range_average AS `Jobs__salary_range_average`, <br>
Jobs.salary_range_remarks AS `Jobs__salary_range_remarks`, <br>
Jobs.restriction AS `Jobs__restriction`, <br>
Jobs.estimated_total_workers AS `Jobs__estimated_total_workers`, <br>
Jobs.remarks AS `Jobs__remarks`, <br>
Jobs.url AS `Jobs__url`,<br>
Jobs.seo_description AS `Jobs__seo_description`, <br>
Jobs.seo_keywords AS `Jobs__seo_keywords`, <br>
Jobs.sort_order AS `Jobs__sort_order`,<br>
Jobs.publish_status AS `Jobs__publish_status`, <br>
Jobs.version AS `Jobs__version`,<br>
Jobs.created_by AS `Jobs__created_by`,<br>
Jobs.created AS `Jobs__created`,<br>
Jobs.modified AS `Jobs__modified`,<br>
Jobs.deleted AS `Jobs__deleted`,<br>
JobCategories.id AS `JobCategories__id`, <br>
JobCategories.name AS `JobCategories__name`, <br>
JobCategories.sort_order AS `JobCategories__sort_order`, <br>
JobCategories.created_by AS `JobCategories__created_by`, <br>
JobCategories.created AS `JobCategories__created`, <br>
JobCategories.modified AS `JobCategories__modified`, <br>
JobCategories.deleted AS `JobCategories__deleted`, <br>
JobTypes.id AS `JobTypes__id`,<br>
JobTypes.name AS `JobTypes__name`, <br>
JobTypes.job_category_id AS `JobTypes__job_category_id`, <br>
JobTypes.sort_order AS `JobTypes__sort_order`,<br>
JobTypes.created_by AS `JobTypes__created_by`, <br>
JobTypes.created AS `JobTypes__created`, <br>
JobTypes.modified AS `JobTypes__modified`, <br>
JobTypes.deleted AS `JobTypes__deleted` <br>
FROM jobs Jobs <br>
WHERE EXISTS (<br>
    SELECT 1<br>
    FROM job_categories JC<br>
    WHERE  JC.id = Jobs.job_category_id AND JC.name LIKE ‘%キャビンアテンダント%‘<br>
) <br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM job_types JT<br>
    WHERE  JT.id = Jobs.job_type_id AND JT.name LIKE ‘%キャビンアテンダント%‘<br>
) <br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM jobs J<br>
    WHERE  j.id = Jobs.id AND (<br>
        j.name LIKE ‘%キャビンアテンダント%‘<br>
        OR J.description LIKE ‘%キャビンアテンダント%‘<br>
        OR J.detail LIKE ‘%キャビンアテンダント%‘<br>
        OR J.business_skill LIKE ‘%キャビンアテンダント%‘<br>
        OR J.knowledge LIKE ‘%キャビンアテンダント%‘<br>
        OR J.location LIKE ‘%キャビンアテンダント%‘<br>
        OR J.activity LIKE ‘%キャビンアテンダント%‘<br>
        OR J.salary_statistic_group LIKE ‘%キャビンアテンダント%‘<br>
        OR J.salary_range_remarks LIKE ‘%キャビンアテンダント%‘<br>
        OR J.restriction LIKE ‘%キャビンアテンダント%‘<br>
        OR J.remarks LIKE ‘%キャビンアテンダント%‘<br>
    )<br>
)<br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM job_personalities  JobPersonalities<br>
    INNER JOIN personalities Personalities<br>
        ON Personalities.id JobPersonalities.personality_id<br>
        AND Personalities.deleted IS NULL<br>
    WHERE JobPersonalities.job_id = Jobs.id<br>
) <br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM job_practical_skills  JobPracticalSkills<br>
    INNER JOIN  practical_skills PracticalSkills<br>
        ON PracticalSkills.id JobPracticalSkills.practical_skill_id<br>
        AND PracticalSkills.deleted IS NULL<br>
    WHERE JobPracticalSkills.job_id = Jobs.id<br>
) <br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM job_basic_abilities  JobBasicAbilities<br>
    INNER JOIN  basic_abilties BasicAbilities<br>
        ON BasicAbilities.id JobBasicAbilities.basic_ability_id<br>
        AND BasicAbilities.deleted IS NULL<br>
    WHERE JobBasicAbilities.job_id = Jobs.id<br>
)<br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM job_tools  JobTools<br>
    INNER JOIN  affiliates Tools<br>
        ON Tools.type = 1 <br>
        AND Tools.id = JobTools.affiliate_id<br>
        AND Tools.deleted IS NULL<br>
    WHERE JobTools.job_id = Jobs.id<br>
)<br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM jobs_career_paths  JobsCareerPaths<br>
    INNER JOIN  affiliates CareerPaths<br>
        ON CareerPaths.type = 3 <br>
        AND CareerPaths.id = JobsCareerPaths.affiliate_id<br>
        AND CareerPaths.deleted IS NULL<br>
    WHERE JobsCareerPaths.job_id = Jobs.id<br>
)<br>
OR EXISTS (<br>
    SELECT 1<br>
    FROM jobs_rec_qualifications  JobRecQualifications<br>
    INNER JOIN  affiliates RecQualifications<br>
        ON RecQualifications.type = 2 <br>
        AND RecQualifications.id = JobRecQualifications.affiliate_id<br>
        AND RecQualifications.deleted IS NULL<br>
    WHERE JobRecQualifications.job_id = Jobs.id<br>
)<br>
AND jobs.publish_status = 1<br>
AND Jobs.deleted IS NULL<br>
GROUP BY Jobs.id<br>
ORDER BY Jobs.sort_order desc, <br>
Jobs.id DESC LIMIT 50 OFFSET 0

