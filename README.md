        Application users can have two roles (roles): system administrator and damage officer.
        The application is closed and no user registration is possible. 
        Only the system administrator can call (create) users and assign them rolls.
        The user receives a registration invitation email from the system administrator and sets his own password.
        Write a seed class for users that has one system administrator and one damage officer.
        The system administrator can only create, view, modify, and delete objects (centers).
        The center has a name, address, telephone number and an opening date. Name and address are required information.
        The damage officer can create, modify, and view the damage, and the system administrator can delete them,
        as well as change the damage status to SOLVED.
        The damage is center-related (object) and has a date, description, priority type (critical, low, medium and high),
        and status (resolved and not resolved) and all fields are required. All created damage has the status NOT RESOLVED.
        The system administrator receives a notification (mail) when creating a defect whose priority type is CRITICAL. 
        The notification is sent once a day until the damage is resolved.
                    
                              Technologies: Laravel 7
                            I used repository patern, and gate facade.
    
    
    
 
