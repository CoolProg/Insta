{% if login_url %}

login with instagram

{% else %}

{{ data.user.username }}

username: {{ data.user.username }}

    

bio: {{ data.user.bio }}


      

website: {{ data.user.website }}


       

id: {{ data.user.id }}


       

access token: {{ data.access_token }}
{% endif %}