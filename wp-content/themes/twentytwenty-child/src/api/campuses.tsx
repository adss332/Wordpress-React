import * as element from '@wordpress/element';
import axios from 'axios';
import { TermsCheckBoxes } from '../Interfaces/checkBoxesTermsInterface';

const wp: {
  element: typeof import("@wordpress/element");
} = { element };
const { useState, useEffect } = wp.element;

export function useCampuses() {
  const [ campuses, setCampuses ] = useState<TermsCheckBoxes>([]);
  const [ loading, setLoading ] = useState(false);
  const [ error, setError ] = useState(false);

  async function getCampuses() {
    try {
      setLoading(true);
      const response = await axios.get<TermsCheckBoxes[]>('/wp-json/courses/v1/getcampuses');
      setLoading(false);
      setCampuses(response.data);
    } catch (e: unknown) {
      setError(true);
    }
  }

  useEffect(() => {
    getCampuses();
  }, [])

  return { campuses };
}