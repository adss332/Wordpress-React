import * as element from '@wordpress/element';
import axios from 'axios';
import { CoursesInterface } from '../Interfaces/courseInterface';

const wp: {
  element: typeof import("@wordpress/element");
} = { element };
const { useState, useEffect } = wp.element;

export function useCourses() {
  const [ courses, setCourses ] = useState<CoursesInterface>([]);
  const [ loading, setLoading ] = useState(false);
  const [ error, setError ] = useState(false);

  async function getCourses() {
    try {
      setLoading(true);
      const response = await axios.get<CoursesInterface[]>('/wp-json/courses/v1/getcourses');
      setLoading(false);
      setCourses(response.data);
    } catch (e: unknown) {
      setError(true);
    }
  }

  useEffect(() => {
    getCourses();
  }, [])

  return { courses };
}