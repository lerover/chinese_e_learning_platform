
export interface Course {
    id: number;
    title: string;
    description: string;
    course_category_id: string;
    price_per_month: string | number;
    thumbnail: string | undefined;
    course_data: {id: number, data: string}[];
    created_at: string;
    updated_at: string;
    course_category: CourseCategory;
}