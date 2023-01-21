export interface CoursesInterface {
  campuses?: {
    count: number,
    description: string,
    name: string,
    parent: number,
    slug: string,
    taxonomy: string,
    term_group: number,
    term_id: number,
    term_taxonomy_id: number,
  },
  ctype?: {
    count: number,
    description: string,
    name: string,
    parent: number,
    slug: string,
    taxonomy: string,
    term_group: number,
    term_id: number,
    term_taxonomy_id: number,
  },
  duration?: string,
  img: string,
  title: string,
}

