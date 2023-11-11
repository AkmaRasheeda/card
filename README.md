## Test Program Contents

<b>A) Programming Test</b>

Using Laravel Framework v10
- Language PHP
- PHP v8.2.7
- MySQL v8.0.33
- Css: <a href="https://demo.templatemonster.com/demo/51689.html?_gl=1*1mikfyq*_ga*NDc0ODMzOTcxLjE2OTk2MjAzMTg.*_ga_FTPYEGT5LY*MTY5OTYyMDMxOC4xLjEuMTY5OTYyNDMzNi4zMi4wLjA." target="blank">Bootstrap Template</a>
- Total time spent: 30 minutes for backend codes, 2 hours for frontend codes


<b>B) SQL Improvement Logic Test</b>

i). Written explanation of the logical improvement

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
FROM jobs Jobs
WHERE EXISTS (
    SELECT 1
    FROM job_categories JC
    WHERE  JC.id = Jobs.job_category_id AND JC.name LIKE ‘%キャビンアテンダント%‘
) 
OR EXISTS (
    SELECT 1
    FROM job_types JT
    WHERE  JT.id = Jobs.job_type_id AND JT.name LIKE ‘%キャビンアテンダント%‘
) 
OR EXISTS (
    SELECT 1
    FROM jobs J
    WHERE  j.id = Jobs.id AND (
        j.name LIKE ‘%キャビンアテンダント%‘
        OR J.description LIKE ‘%キャビンアテンダント%‘
        OR J.detail LIKE ‘%キャビンアテンダント%‘
        OR J.business_skill LIKE ‘%キャビンアテンダント%‘
        OR J.knowledge LIKE ‘%キャビンアテンダント%‘
        OR J.location LIKE ‘%キャビンアテンダント%‘
        OR J.activity LIKE ‘%キャビンアテンダント%‘
        OR J.salary_statistic_group LIKE ‘%キャビンアテンダント%‘
        OR J.salary_range_remarks LIKE ‘%キャビンアテンダント%‘
        OR J.restriction LIKE ‘%キャビンアテンダント%‘
        OR J.remarks LIKE ‘%キャビンアテンダント%‘
    )
)
OR EXISTS (
    SELECT 1
    FROM job_personalities  JobPersonalities
    INNER JOIN personalities Personalities
        ON Personalities.id JobPersonalities.personality_id
        AND Personalities.deleted IS NULL
    WHERE JobPersonalities.job_id = Jobs.id
) 
OR EXISTS (
    SELECT 1
    FROM job_practical_skills  JobPracticalSkills
    INNER JOIN  practical_skills PracticalSkills
        ON PracticalSkills.id JobPracticalSkills.practical_skill_id
        AND PracticalSkills.deleted IS NULL
    WHERE JobPracticalSkills.job_id = Jobs.id
) 
OR EXISTS (
    SELECT 1
    FROM job_basic_abilities  JobBasicAbilities
    INNER JOIN  basic_abilties BasicAbilities
        ON BasicAbilities.id JobBasicAbilities.basic_ability_id
        AND BasicAbilities.deleted IS NULL
    WHERE JobBasicAbilities.job_id = Jobs.id
)
OR EXISTS (
    SELECT 1
    FROM job_tools  JobTools
    INNER JOIN  affiliates Tools
        ON Tools.type = 1 
        AND Tools.id = JobTools.affiliate_id
        AND Tools.deleted IS NULL
    WHERE JobTools.job_id = Jobs.id
)
OR EXISTS (
    SELECT 1
    FROM jobs_career_paths  JobsCareerPaths
    INNER JOIN  affiliates CareerPaths
        ON CareerPaths.type = 3 
        AND CareerPaths.id = JobsCareerPaths.affiliate_id
        AND CareerPaths.deleted IS NULL
    WHERE JobsCareerPaths.job_id = Jobs.id
)
OR EXISTS (
    SELECT 1
    FROM jobs_rec_qualifications  JobRecQualifications
    INNER JOIN  affiliates RecQualifications
        ON RecQualifications.type = 2 
        AND RecQualifications.id = JobRecQualifications.affiliate_id
        AND RecQualifications.deleted IS NULL
    WHERE JobRecQualifications.job_id = Jobs.id
)
AND jobs.publish_status = 1
AND Jobs.deleted IS NULL
GROUP BY Jobs.id
ORDER BY Jobs.sort_order desc, 
Jobs.id DESC LIMIT 50 OFFSET 0

