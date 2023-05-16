export interface Candidate {
    name: string
    email: string 
  }
  
  export interface Skill {
    name: string
  }
  
  export interface Experience {
    company_name: string
    job_title: string
    start_date: Date
    end_date: Date 
    description: string 
  
}
    
export type Skills = Array<Skill>
export type Experiences = Array<Experience> 

export interface Resume {
    candidate: Candidate
    skills: Skills
    experiences: Experiences 
}